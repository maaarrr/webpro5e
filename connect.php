<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_webpro5e";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Set charset to UTF-8
$conn->set_charset('utf8');

// Check connection
if ($conn->connect_error) {
  // Log error, do not show sensitive info to user
  error_log('Connection failed: ' . $conn->connect_error);
  echo "Database connection error. Please contact administrator.";
  exit;
}
// echo "Connected successfully" . "<br>";
?>