<?php
//Create connection
include 'connect.php';

//Insert data
$stmt = $conn->prepare("INSERT INTO products(name, description, price) VALUES (?, ?, ?)");
$name = 'Hardcase';
$desc = 'Protect your gadget';
$price = 25000;
$stmt->bind_param("ssd", $name, $desc, $price);
if ($stmt->execute()) {
  echo "New record created successfully";
} else {
  error_log('Insert error: ' . $stmt->error);
  echo "Error creating record.";
}
$stmt->close();

$conn->close();
?>