<?php
include 'connect.php';

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $prodName = $_POST['name'];
    $prodDesc = $_POST['desc'];
    $prodPrice = $_POST['price'];

    echo "Product Name: " . $prodName . "<br>";
    echo "Description: " . $prodDesc . "<br>";  
    echo "Price: " . $prodPrice . "<br>";
    

    // Query insert data
    $sql = "INSERT INTO products (name, description, price) VALUES ('$prodName', '$prodDesc', '$prodPrice')";
    echo "<br>";
    if ($conn->query($sql) === TRUE) {
        echo "Product successfully added.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
echo "<button type='button' onclick=\"window.location.href='read_all.php';\">View All Products</button><br>";
$conn->close();
?>