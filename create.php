<?php
include 'connect.php';

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $prodName = trim($_POST['name']);
    $prodDesc = trim($_POST['desc']);
    $prodPrice = trim($_POST['price']);

    // Validasi sederhana
    if ($prodName === '' || $prodDesc === '' || !is_numeric($prodPrice)) {
        echo "Input tidak valid.";
    } else {
        echo "Product Name: " . htmlspecialchars($prodName) . "<br>";
        echo "Description: " . htmlspecialchars($prodDesc) . "<br>";
        echo "Price: " . htmlspecialchars($prodPrice) . "<br>";

        // Query insert data dengan prepared statement
        $stmt = $conn->prepare("INSERT INTO products (name, description, price) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $prodName, $prodDesc, $prodPrice);
        if ($stmt->execute()) {
            echo "Product successfully added.";
        } else {
            error_log('Insert error: ' . $stmt->error);
            echo "Error adding product. Please try again.";
        }
        $stmt->close();
    }
}
echo "<button type='button' onclick=\"window.location.href='read_all.php';\">View All Products</button><br>";
$conn->close();
?>