<?php
include_once "../connect-db.php";

if (!isset($_POST['email']) || !isset($_POST['password'])) {

	$_SESSION['msg'] = 'Invalid POST variable keys! Refresh the page!';

	header('location: index.php');

	exit();
}


$email=$_POST['email'];
$password=$_POST['password'];


if (empty($email)) {
    header("location: ../../admin/index.php?error=Email is required!");
    exit();
}

$sql = "SELECT * FROM admin WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$arr_login = $result->fetch_all(MYSQLI_ASSOC);

if (count($arr_login) == 0) {
    header("location: ../../admin/index.php?error=User with entered email doesn't exist!");
    exit();
}

if (empty($password)) {
    header("location: ../../admin/index.php?error=Password is required!");
    exit();
}

// Password validation
if ($password !== $arr_login[0]['password']) {
    header("location: ../../admin/index.php?error=Invalid password!");
    exit();
}

// Successful login
$_SESSION['username'] = $arr_login[0]['name'];
$_SESSION['msg'] = "You have successfully Logged In!";
header('location: ../../admin/indexdashbord.php');
exit();
?>
