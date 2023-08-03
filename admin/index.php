<?php
session_start();
$msg_error='';
if(isset($_SESSION['msg']))
{
    $msg_error=$_SESSION['msg'];
    unset($_SESSION['msg']);
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

<body>

<span class="error">
    <?php echo isset($_GET['error']) ? $_GET['error']:''?>
</span>
<span class="success">
    <?php echo isset($_GET['success']) ? $_GET['success']:''?>
</span>

   <form class="card login-card" action="../backend/admin/login-admin.php" method="post">
                                        <h4 class="header">Admin Login</h4>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>
    <button class="link-button" type="submit">Login</button>

</form>

</body>
</body>
</html>