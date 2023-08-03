<?php
// update-status.php

session_start();

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]) && isset($_GET["status"])) {
    $orderId = $_GET["id"];
    $status = $_GET["status"];

   
    // Update the delivery status in the database
    require('../connect-db.php');

     // Check if a row with the given order_id exists in the delivery table
     $sql = 'SELECT * FROM orders WHERE id = ?';
     $query = $conn->prepare($sql);
     $query->bind_param('s', $orderId); // Use 'i' for integer type, 's' for string type, etc.
     $query->execute();
     $result = $query->get_result()->fetch_assoc(); // Assuming you want to fetch the result as an associative array
 
     $sql = 'UPDATE orders SET status = ? WHERE id = ?';
     $query = $conn->prepare($sql);
     $query->bind_param('ss', $status, $orderId); // Assuming 'status' is a string and 'id' is an integer
     $query->execute();

    // Redirect back to the original page
    header("Location: ../../admin/order.php");
    exit();
}
?>
