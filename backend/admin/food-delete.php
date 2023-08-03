<?php

session_start();
try {

    if (!file_exists("../connect-db.php" ))
        throw new Exception();
    else
        require_once("../connect-db.php" ); 
		
} catch (Exception $e) {

	$_SESSION['msg'] = 'There were some problem in the Server! Try after some time!';

	header('location: ../../admin/food.php');

	exit();
	
}

if (!isset($_REQUEST['id'])) {

	$_SESSION['msg'] = 'Invalid ID!';

	header('location: ../../admin/food.php');

	exit();
} 

	$id = $_REQUEST['id'];



	
	try {
		$sql = "DELETE FROM foods WHERE id = ?";
		$query = $conn->prepare($sql);
		if ($query->execute([$id])) {
			$_SESSION['food_msg'] = 'Category Deleted!';
			header('location: ../../admin/food.php');
		} else {
			$_SESSION['food_msg'] = 'There were some problem in the server! Please try again after some time!';
			header('location: ../../admin/food.php');
		}
	} catch (mysqli_sql_exception $e) {
		$_SESSION['food_msg'] = 'Cannot delete this FOOD beacuse there is an Order on it!';
		header('location: ../../admin/food.php');
	}