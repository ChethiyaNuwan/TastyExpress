<?php
session_start();
if (!isset($_SESSION['user_data'])){
    header("Location: login.php");
    exit();
}

require_once ('../backend/connect-db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TastyExpress - Orders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../stylesheets/styles.css?2">
</head>
<body>

<?php
include ('shared/header.php');
?>

<span class="error">
    <?php echo isset($_GET['error']) ? $_GET['error']:''?>
</span>
<span class="success">
    <?php echo isset($_GET['success']) ? $_GET['success']:''?>
</span>

<?php

$sql = "SELECT f.name,o.id,o.timestamp,o.status FROM orders o,foods f WHERE f.id=o.food_id ORDER BY timestamp DESC";
$result = mysqli_query($conn,$sql);
$order_data = mysqli_fetch_all($result,MYSQLI_ASSOC);

if (!$order_data){
    echo '<h3 class="no-data">No Orders Yet!</h3>';
}

echo '<div class="detail-cards-grid">';
foreach ($order_data as $order) {
    echo '<div class="card detail-card">
            <div>
                <h3 class="card-title" >' . $order['name'] . '</h3>
                <p>Order ID: ' . $order['id'] . '</p>
                <p>Order Date: ' . $order['timestamp'] . '</p>
                <p>Order Time: ' . $order['timestamp'] . '</p>
            </div>
            <div class="status">
                <h3 class="card-title">Order Status</h3>
                <p>' . $order['status'] . '</p>';
                if ($order['status'] == 'Pending') {
                    echo '<a class="link-button" href="../backend/cancel-order.php?order_id=' . $order['id'] . '">Cancel Order</a>';
                }
      echo '</div>
          </div>';
    }
echo '</div>';
?>

</body>
</html>
