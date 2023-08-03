<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TastyExpress - Delicious Foods Made By Our Finest Chefs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../stylesheets/styles.css?1">
</head>
<body>

<?php
session_start();
include('shared/header.php');
include('shared/banner.php');

require_once('../backend/connect-db.php');
$sql = "SELECT id,name FROM categories";
$result = mysqli_query($conn, $sql);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="foods">
    <h1 class="heading" id="list">Explore Our Delicious Foods</h1>
    <div>
        <?php
        foreach ($categories as $category) {
            echo '<h2 class="title" id="'.$category['name'].'">'.$category['name'].'</h2><hr>
            <div class="cards-grid">';

            $sql = "SELECT * FROM foods WHERE category_id=".$category['id'];
            $result = mysqli_query($conn,$sql);
            $foods = mysqli_fetch_all($result,MYSQLI_ASSOC);
            foreach ($foods as $food) {
                echo '<div class="card item-card">
                    <img src = "'.$food['image_path'].'" alt="'.$food['name'].'_image">
                    <h3 class="card-title" >'.$food['name'].'</h3>
                    <p>'.$food['description'].'</p>
                    <div class="card-action">
                        <span>Rs.'.$food['price'].'</span>';

                if (isset($_SESSION['user_data'])) {
                    echo '<a href="confirm-order.php?food_id='.$food['id'].'" class="link-button">Order</a>';
                } else {
                    echo '<a href="login.php?error=Login first to order!" class="link-button">Order</a>';
                }

                echo '</div>
                  </div >';
            }
            echo '</div>';
        }
        ?>
    </div>
</div>

<?php
include('shared/footer.php');
?>

</body>
</html>