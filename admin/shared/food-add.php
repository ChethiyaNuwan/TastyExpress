

<?php

include_once "../backend/connect-db.php";
//$sql = "SELECT * FROM admin";


$sql = 'SELECT id,name FROM categories';


$result = mysqli_query($conn, $sql);
$arr_all =  $result->fetch_all(MYSQLI_ASSOC);



?>


<div class="categorydashbord" >
  <div class="category-dashbord-internal">

	<div class="category-heading">
  <h3 class="categoryh1">CATEGORIES
</h3>
	</div>
    


    <div class="section center" style="padding: 40px;">
    

        <form class="card" action="../backend/admin/food-add.php" method="post" enctype="multipart/form-data">

        <span class="error">
    <?php echo isset($_GET['food_add_msg']) ? $_GET['food_add_msg']:''?>
</span>

            <div >
                <div>
                            <div class="input-field">
                            <label for="name" style="color: white;"><b>Food Name :</b></label>
                            <input id="name" name="name" type="text" class="validate" style="color: black; width: 70%">

                            </div>
                </div>
                <div >
                            <div class="input-field" style="color: white !important; width: 90%">
						    <label style="color: white;"><b>Categories</b></label>

						    <select name='category'>
						      <?php 

						      		foreach ($arr_all as $key) {
						      			echo '<option value="'.$key['id'].'">'.$key['name'].'</option>';
						      		}
						      ?>
						    </select>
						  </div>
                </div>
            </div>

            <div >
                <div >

                <div class="input-field">
                <label for="desc" style="color: white;"><b>Description :</b></label>

                <input id="desc" name="desc" type="text" class="validate" style="color: black; width: 70%">
                </div>
                
                </div>
            
            </div>
            <div >
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>

            <div >
                <div >
                    <div  style="padding: 15px 10px;">
                        <a href="Food.php" class="waves-effect waves-light btn">Dismiss</a>
                    </div>
                    <div style="padding: 15px 20px;">
                        <button type="submit" class="waves-effect waves-light btn" name="submit">Add New</button>
                    </div>
                </div>
            </div>
            <div id="display-image">
   
    </div>

        </form>


    </div>

</div>

