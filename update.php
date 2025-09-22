<?php
include 'connect.php';

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $prodName = $_POST['name'];
    $prodDesc = $_POST['desc'];
    $prodPrice = $_POST['price'];
    $id = $_POST['id'];

    echo "Product Name: " . $prodName . "<br>";
    echo "Description: " . $prodDesc . "<br>";  
    echo "Price: " . $prodPrice ;
    

    // Query insert data
    $sql = "UPDATE products SET name = '$prodName', description = '$prodDesc', price = '$prodPrice' WHERE id = $id ";
    echo "<br>";
    if ($conn->query($sql) === TRUE) {
        echo "Product successfully Updated. <br> <br>";
        echo "<button type='button' onclick=\"window.location.href='read_all.php';\">View All Products</button>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>