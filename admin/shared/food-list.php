


<?php

include_once "../backend/connect-db.php";
//$sql = "SELECT * FROM admin";


$sql = 'SELECT foods.id, foods.name, foods.description,foods.image_path, categories.name AS category_name,foods.price
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

 

	<div class="food-add">
    
		<a href="FoodADD.php" class=""><button class="link-button-new">Add New</button></a>
	</div>
  <!-- <div class="food-thead">
        
            <div>Name</div>
            
            <div class="food-description-head"> Description</div>
            <div class="food-image-head">Image</div>
            <div class="food-Category-head">Category</div>
            <div class="food-Category-head">Price</div>

            
        
</div> -->
<div class="table-container-heading" style="padding: 0px 20px 6px 20px;">
<table class="food-table">
     

      <thead>
       <tr >
         <td class="food-name-cell" style="width:130px;"> <center>Name</center></td>
         <th class="food-description-cell"><center>Description</center></th>
         <th style="width:110px;"><center>Image</center></th>
         <th><center class="name-cell">Category</center></th>
         <th><center class="price-cell">Price</center></th>
         <th style="width:60px;"></th>

       </tr>

      
      
     </thead>
   </table>
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
            <td style="width:100px;"><center><img width="100" src="../images/food/<?php echo $key['image_path']; ?>"></center></td>
            <td><center class="name-cell"><?php echo $key['category_name']; ?></center></td>
            <td><center class="price-cell"><?php echo $key['price']; ?></center></td>

            <td><center><a href="../backend/admin/food-delete.php?id=<?php echo $key['id'].'&path='.$key['image_path'] ?>"><span style="font-size:12px;" class="new badge" data-badge-caption="">Delete</span></a></center></td>
          </tr>

          <?php } ?>
         
        </tbody>
      </table>
	</div>
  <?php

if (isset($_SESSION['food_msg'])) {
    echo '<div class="section center" style="margin: 5px 35px;"><div class="row" style="background: red; color: white;">
    <div class="col s12">
        <h6>'.$_SESSION['food_msg'].'</h6>
        </div>
    </div></div>';
    unset($_SESSION['food_msg']);
}

?>
  </div>
</div>

<!-- <?php require('layout/about-modal.php'); ?> -->
<!-- <?php require('layout/footer.php'); ?> -->




