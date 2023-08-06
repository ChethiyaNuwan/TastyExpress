<?php
session_start();
require_once('../backend/connect-db.php');

if (isset($_SESSION['user_data']) && isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];

    $sql = "DELETE FROM orders WHERE id='$order_id'";
    $result = mysqli_query($conn,$sql);
    header('Location: ../user/orders.php?success=Order canceled!');
} else {
    header('Location: ../user/orders.php?error=Something went wrong!');
}