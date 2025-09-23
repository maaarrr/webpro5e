<?php
//Create connection
include 'connect.php';

//Insert data
$sql = "INSERT INTO products(name, description, price)
VALUES ('Hardcase', 'Protect your gadget', 25.000)";

//check if data is inserted
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>