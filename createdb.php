<?php
//Create connection
include 'connect.php';

// Create database
$sql = "CREATE DATABASE my5edb";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  error_log('Create DB error: ' . $conn->error);
  echo "Error creating database.";
}

$conn->close();
?>