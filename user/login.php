<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TastyExpress - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../stylesheets/styles.css">
</head>
<body>

<?php
include('shared/header.php');
?>

<form class="card login-card" action="login.php" method="post">
    <span>Already have an account ?</span>
    <label for="email">Email</label>
    <input type="email" id="email" required>
    <label for="password">Password</label>
    <input type="password" id="password" required>
    <button class="link-button" type="submit">Login</button>
    <span>or</span>
    <a href="register.php">Register</a>
</form>


</body>
</html>