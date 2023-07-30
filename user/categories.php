<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TastyExpress - Wide Range Of Categories To Choose From</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../stylesheets/styles.css">
</head>
<body>

<?php
include('shared/header.php');
include('shared/banner.php');
?>

<div class="categories">
    <h1 class="heading" id="list">We Offer Wide Range Of Categories</h1>
    <div class="cards-grid">
        <?php
        for ($i = 0; $i < 5; $i++) {
            echo '<div class="card item-card" >
                    <img src = "../images/banner1.jpg" >
                    <h3 class="card-title" > Indian</h3 >
                    <p> sndciducjidjvodsav</p>
                    <a href = "foods.php" class="link-button">Explore</a>
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