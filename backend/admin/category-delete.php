<?php

session_start();
try {

    if (!file_exists("../connect-db.php" ))
        throw new Exception();
    else
        require_once("../connect-db.php");
		
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

if (!isset($_REQUEST['path'])) {

    $_SESSION['msg'] = 'Invalid path!';

    header('location: ../../admin/category.php');

    exit();
}

    $path = $_REQUEST['path'];






try {
		$sql = "DELETE FROM categories WHERE id = ?";
    $query  = $conn->prepare($sql);
		if ($query->execute([$id])) {
			$_SESSION['category_msg'] = 'Category Deleted!';

            //deleting image from local
            unlink('../../images/category/'.$path);

			header('location: ../../admin/category.php');
		} else {
			$_SESSION['category_msg'] = 'There were some problem in the server! Please try again after some time!';
			header('location: ../../admin/category.php');

		}
	} catch (mysqli_sql_exception $e) {
		$_SESSION['category_msg'] = 'Cannot delete this CATEGORY because there is a FOOD on it!';
			header('location: ../../admin/category.php');
	}