<?php
include 'connect.php';

// simpan data dari form ke variabel
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

// query insert
$sql = "INSERT INTO products (name, description, price)
        VALUES ('$name', '$description', '$price')";

if (mysqli_query($conn, $sql)) {
    // redirect ke halaman list product
    header('Location: read_all.php');
    exit; // penting supaya script berhenti setelah redirect
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
