<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TastyExpress - Delicious Foods Made By Our Finest Chefs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../stylesheets/styles.css">
</head>
<body>

<?php
include('shared/header.php');
include('shared/banner.php');
?>

<div class="foods">
    <h1 class="heading" id="list">Explore Our Delicious Foods</h1>
    <div>
        <?php
        for ($i = 0; $i < 5; $i++) {
            echo '<h2 class="title">Indian</h2><hr>
            <div class="cards-grid">';
            for ($j = 0; $j < 3; $j++) {
                echo '<div class="card" >
                    <img src = "../images/banner1.jpg" >
                    <h3 class="card-title" > Noodles</h3 >
                    <p> sndciducjidjvodsav</p>
                    <a href = "foods.php" class="link-button">Explore</a>
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