<?php
include 'connect.php';

//Read One Record
$sql = "SELECT * FROM products WHERE id = 1"; //sql query to read one record by id
$result = $conn->query($sql); //execute the query
$row = $result->fetch_assoc(); //fetch the record as an associative array

// // Display the product details
// echo "Product ID: " . $row['id'] . "<br>";
// echo "Product Name: " . $row['name'] . "<br>";
// echo "Description: " . $row['description'] . "<br>";
// echo "Price: " . $row['price'] . "<br>";
// echo "Created At: " . $row['created'] . "<br>";
// echo "<hr>"; // Separator line

// Link to go back to add product page
echo "<a href='form_input_product.php'>Add Product</a><br><br>";

// Display the product details in a table
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Product ID</th><th>Product Name</th><th>Description</th><th>Price</th><th>Created At</th></tr>";
echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['description'] . "</td><td>". $row['price'] . "</td><td>" . $row['created'] . "</td></tr>";
echo "</table>";


// Close the connection
$conn->close();
?>