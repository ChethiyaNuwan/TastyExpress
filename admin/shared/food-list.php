


<?php
include_once "../backend/connect-db.php";
//$sql = "SELECT * FROM admin";


$sql = 'SELECT foods.id, foods.name, foods.description,foods.image_path, categories.name AS category_name
        FROM foods
        LEFT JOIN categories
        ON foods.category_id = categories.id';


$result = mysqli_query($conn, $sql);
$arr_all =  $result->fetch_all(MYSQLI_ASSOC);




?>
						

<div class="fooddashbord" >
  <div class="food-dashbord-internal">

	<div class="food-heading">
		<h1 class="foodh1">FOODS</h1>
	</div>

  <?php

    if (isset($_SESSION['msg'])) {
        echo '<div class="section center" style="margin: 5px 35px;"><div class="row" style="background: red; color: white;">
        <div class="col s12">
            <h6>'.$_SESSION['msg'].'</h6>
            </div>
        </div></div>';
        unset($_SESSION['msg']);
    }

    ?>

	<div class="food-add">
    
		<a href="FoodADD.php" class=""><button class="button">Add New</button></a>
	</div>
  <div class="food-thead">
        
            <div>Name</div>
            
            <div class="food-description-head"> Description</div>
            <div class="food-image-head">Image</div>
            <div class="food-Category-head">Category</div>
            <div></div>
        
</div>
	
	<div class="table-container" style="padding: 20px;">
		<table class="food-table">
     

        <tbody >
          <?php

            foreach ($arr_all as $key) {

          ?>
          <tr >
            <td class="food-name-cell"> <center><?php echo $key['name']; ?></center></td>
            <td class="food-description-cell"><center><?php echo $key['description']; ?></center></td>
            <td><center><img width="100" src="../images/food/<?php echo $key['image_path']; ?>"></center></td>
            <td><center class="name-cell"><?php echo $key['category_name']; ?></center></td>
            <td><center><a href="../backend/admin/food-delete.php?id=<?php echo $key['id']; ?>"><span class="new badge" data-badge-caption="">Delete</span></a></center></td>
          </tr>

          <?php } ?>
         
        </tbody>
      </table>
	</div>
  </div>
</div>

<!-- <?php require('layout/about-modal.php'); ?> -->
<!-- <?php require('layout/footer.php'); ?> -->

