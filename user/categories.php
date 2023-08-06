<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TastyExpress - Wide Range Of Categories To Choose From</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../stylesheets/styles.css?1">
</head>
<body>

<?php
session_start();
include('shared/header.php');
include('shared/banner.php');

require_once('../backend/connect-db.php');
$sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $sql);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="categories">
    <h1 class="heading" id="list">We Offer Wide Range Of Categories</h1>
    <div class="cards-grid">
        <?php
        foreach ($categories as $category){
            echo '<div class="card item-card" >
                    <img src = "'.$category['image_path'].'" alt="'.$category['name'].'_image">
                    <h3 class="card-title" >'.$category['name'].'</h3 >
                    <p>'.$category['description'].'</p>
                    <a href = "foods.php#'.$category['name'].'" class="link-button">Explore</a>
                  </div >';
        }
        ?>
    </div>
</div>

<?php
include('shared/footer.php');
?>

</body>
</html>