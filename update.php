<?php
include 'connect.php';

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $prodName = trim($_POST['name']);
    $prodDesc = trim($_POST['desc']);
    $prodPrice = trim($_POST['price']);
    $id = intval($_POST['id']);

    // Validasi sederhana
    if ($prodName === '' || $prodDesc === '' || !is_numeric($prodPrice) || $id <= 0) {
        echo "Input tidak valid.";
    } else {
        echo "Product Name: " . htmlspecialchars($prodName) . "<br>";
        echo "Description: " . htmlspecialchars($prodDesc) . "<br>";
        echo "Price: " . htmlspecialchars($prodPrice);

        // Query update data dengan prepared statement
        $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?");
        $stmt->bind_param("ssdi", $prodName, $prodDesc, $prodPrice, $id);
        if ($stmt->execute()) {
            echo "Product successfully Updated. <br> <br>";
            echo "<button type='button' onclick=\"window.location.href='read_all.php';\">View All Products</button>";
        } else {
            error_log('Update error: ' . $stmt->error);
            echo "Error updating product. Please try again.";
        }
        $stmt->close();
    }
}
$conn->close();
?>