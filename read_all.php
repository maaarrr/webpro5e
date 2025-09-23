<?php
include 'connect.php';
include 'delete.php'; // Include file delete.php untuk memanggil fungsi deleteRecord

// Cek apakah ada permintaan penghapusan
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Panggil fungsi deleteRecord
    if (deleteRecord($conn, $delete_id)) {
        echo "Record with ID $delete_id deleted successfully.<br>";
    } else {
        echo "Failed to delete record with ID $delete_id.<br>";
    }
}

// Query untuk membaca semua data dari tabel products
$sql = "SELECT * FROM products"; // SQL query untuk membaca semua record
$result = $conn->query($sql); // Eksekusi query

// Link to go back to add product page
echo "<a href='form_input_product.php'>Add Product</a><br><br>";

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
        <th>No</th>
        <th>Product Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Created At</th>
        <th>Actions</th>
        </tr>";
    $no = 1;
    // Loop melalui semua record dan tampilkan
    while ($row = $result->fetch_assoc()) {

        // Display the product details in a table
        echo "<tr>
                <td>" . $no++ . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['description'] . "</td>
                <td>". $row['price'] . "</td>
                <td>" . $row['created'] . "</td>
                <td>
                    <a href='form_update.php?id=" . $row['id'] . "'>Edit</a> |
                    <a href='read_all.php?delete_id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this product?');\">Delete</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No products found.";
}

// Tutup koneksi
$conn->close();
?>