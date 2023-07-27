<?php

session_start();
try {

    if (!file_exists("../connect-db.php" ))
        throw new Exception();
    else
        require_once("../connect-db.php" ); 
		
} catch (Exception $e) {

	$_SESSION['msg'] = 'There were some problem in the Server! Try after some time!';

	header('location: ../../admin/category.php');

	exit();
	
}

if (!isset($_REQUEST['id'])) {

	$_SESSION['msg'] = 'Invalid ID!';

	header('location: ../../admin/category.php');

	exit();
} 

	$id = $_REQUEST['id'];



	
	$sql = "DELETE FROM categories WHERE id = ?";
    $query  = $conn->prepare($sql);
    if ($query->execute([$id])) {

    	$_SESSION['msg'] = 'Category Deleted!';

		header('location: ../../admin/category.php');
    	
    } else {

    	$_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';

		header('location: ../../admin/category.php');

    }

