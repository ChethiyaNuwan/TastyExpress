<?php
session_start();

try {
    if (!file_exists("../connect-db.php")) {
        throw new Exception();
    } else {
        require_once("../connect-db.php");
    }if (empty($_POST['name']) || empty($_POST['desc']) ) {
        $_SESSION['category_add_msg'] = 'A field is empty! Please fill all the required fields.';
        header("location: ../../admin/CategoryADD.php?food_add_msg=Fileds are EMPTY !");
        exit();
    }
} catch (Exception $e) {
    $_SESSION['category_add_msg'] = 'There were some problems on the server! Try again after some time!';
    header('location: ../../admin/category.php');
    exit();
}


$regex = '/^[(A-Z)?(a-z)?(0-9)?\-?\_?\.?\s*]+$/';

if (!preg_match($regex, $_POST['name']) || !preg_match($regex, $_POST['desc'])) {
    $_SESSION['category_add_msg'] = 'Whoa! Invalid Inputs!';
    header('location: ../../admin/category.php');
    exit();
} else {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
  

  
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "../../images/category/" . $filename;

        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            $msg = "<h3>  Image uploaded successfully!</h3>";

            // Insert the food details along with the image filename into the foods table
            $sql = "INSERT INTO categories (id, name, description, image_path) VALUES (?, ?, ?, ?)";
            $query = $conn->prepare($sql);
            if ($query->execute([$category, $name, $desc, $filename])) {
                $_SESSION['category_add_msg'] = 'Food Added!';
            } else {
                $_SESSION['category_add_msg'] = 'There were some problems on the server! Please try again after some time!';
            }
        } else {
            $msg = "<h3>  Failed to upload image!</h3>";
            $_SESSION['category_add_msg'] = 'There were some problems with image upload! Please try again!';
        }
    
    // End of Image Upload Section

    header('location: ../../admin/category.php');
}
?>


