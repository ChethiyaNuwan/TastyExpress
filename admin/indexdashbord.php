<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TastyExpress - The Perfect Food at Your Door!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../stylesheets/admin-styles.css">
</head>
<body style="font-family: Verdana, sans-serif;">

<?php
include ('shared/navbar.php');


?>
<div class="index-page">
    <div class="index-page-left">
        <?php 
include ('shared/Sidebar.php');
?></div>
    <div class="index-page-right">
        <?php 
include ('dashbord.php');
?></div>

</div>


</body>
</html>