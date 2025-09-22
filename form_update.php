<?php
include 'connect.php';
// Ambil data produk berdasarkan ID
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc(); // Ambil data produk
?>

<h2>Update Product</h2>
<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?= $row['id']; ?>" readonly>
    Product Name: <br><input type="text" name="name" value="<?= $row['name']; ?>"><br>
    Description: <br><textarea name="desc"><?= $row['description']; ?></textarea><br>
    Price: <br><input type="text" name="price" value="<?= $row['price']; ?>"><br>
    <br>
    <input type="submit" value="Update Product">
</form>