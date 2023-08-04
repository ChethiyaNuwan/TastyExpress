<?php
session_start();
require_once('../backend/connect-db.php');

if (isset($_SESSION['user_data']) && isset($_GET['food_id'])){
    $email = $_SESSION['user_data']['email'];
    $food_id = $_GET['food_id'];
    $id = "TE".time();

    $sql = "INSERT INTO orders (id, food_id, user_email) VALUES ('$id','$food_id','$email')";
    $result = mysqli_query($conn,$sql);
    header('Location: ../user/orders.php?success=Order placed successfully!');
} else {
    header('Location: ../user/orders.php?error=Something went wrong!');
}