<?php
//Create connection
include 'connect.php';

// sql to create table
$sql = "CREATE TABLE products(
id INT(11) NOT NULL AUTO_INCREMENT,
name VARCHAR(50) NOT NULL,
description TEXT NOT NULL,
price DOUBLE NOT NULL,
created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (id) 
)";


if ($conn->query($sql) === TRUE) {
  echo "Table products created successfully";
} else {
  error_log('Create table error: ' . $conn->error);
  echo "Error creating table.";
}

$conn->close();
?>