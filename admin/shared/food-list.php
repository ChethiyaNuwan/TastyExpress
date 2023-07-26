


<?php
include_once "../backend/connect-db.php";
//$sql = "SELECT * FROM admin";


$sql = 'SELECT foods.id, foods.name, foods.description, categories.name
        FROM foods
        LEFT JOIN categories
        ON foods.category_id = categories.id';


$result = mysqli_query($conn, $sql);
$arr_all =  $result->fetch_all(MYSQLI_ASSOC);




?>
						

<div class="fooddashbord" style="background: #B35458;">

	<div class="section">
		<h3>Foods</h3>
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

	<div class="section right" style="padding: 15px 25px;">
		<a href="FoodADD.php" class="waves-effect waves-light btn">Add New</a>
	</div>
	
	<div class="section center" style="padding: 20px;">
		<table class="centered responsive-table">
        <thead>
          <tr>
              <th>Name</th>
              <th>Description</th>
              <th>Category</th>
              <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php

            foreach ($arr_all as $key) {

          ?>
          <tr>
            <td><?php echo $key['name']; ?></td>
            <td><?php echo $key['description']; ?></td>
            <td><?php echo $key['name']; ?></td>
            <td><a href="../backend/admin/food-delete.php?id=<?php echo $key['id']; ?>"><span class="new badge" data-badge-caption="">Delete</span></a></td>
          </tr>

          <?php } ?>
         
        </tbody>
      </table>
	</div>
</div>

<!-- <?php require('layout/about-modal.php'); ?> -->
<!-- <?php require('layout/footer.php'); ?> -->