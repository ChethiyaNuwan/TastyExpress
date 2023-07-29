<?php
include_once "../connect-db.php";

if (!isset($_POST['email']) || !isset($_POST['password'])) {

	$_SESSION['msg'] = 'Invalid POST variable keys! Refresh the page!';

	header('location: index.php');

	exit();
}


$email=$_POST['email'];
$password=$_POST['password'];


$sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";

$result = mysqli_query($conn, $sql);
$arr_login =  $result->fetch_all(MYSQLI_ASSOC);


if (count($arr_login) > 0) {

	foreach($arr_login as $val)
	{
	   $tmp_name= $val['name'];

	}


	session_start();
    $_SESSION['username']=$tmp_name;
    $_SESSION['msg']="You have successfully Logged In!";
    header('location: ../../admin/indexdashbord.php');

} else {
	session_start();
	$_SESSION['msg']="Invalid Credentials!";
	header('location: ../../admin/index.php');
}



?>