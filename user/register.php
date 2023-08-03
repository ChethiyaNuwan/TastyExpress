<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TastyExpress - Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../stylesheets/styles.css?1">
</head>
<body>

<?php
include('shared/header.php');
?>

<span class="error">
    <?php echo isset($_GET['error']) ? $_GET['error']:''?>
</span>
<span class="success">
    <?php echo isset($_GET['success']) ? $_GET['success']:''?>
</span>
<form class="card register-card" action="../backend/register.php" method="post">
    <label for="first_name">First Name</label>
    <input type="text" id="first_name" name="first_name" required>
    <label for="last_name">Last Name</label>
    <input type="text" id="last_name" name="last_name" required>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>
    <label for="confirm_password">Confirm Password</label>
    <input type="password" id="confirm_password" name="confirm_password" required>
    <button class="link-button" type="submit">Register</button>
    <span>Already have an account ?</span>
    <a href="login.php">Login</a>
</form>


</body>
</html>