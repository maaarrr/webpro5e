<?php
include 'connect.php';
function deleteRecord($conn, $id) {
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // "i" untuk integer
    return $stmt->execute();
}
// // Close the connection
// $conn->close();
?>