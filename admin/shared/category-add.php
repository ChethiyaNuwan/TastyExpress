

<?php

// include_once "../backend/connect-db.php";
// //$sql = "SELECT * FROM admin";


// $sql = 'SELECT id,name FROM categories';


// $result = mysqli_query($conn, $sql);
// $arr_all =  $result->fetch_all(MYSQLI_ASSOC);



?>


<div class="section white-text" style="background: #B35458;">

	<div class="section">
		<h3>Add Categories</h3>
	</div>


    <div class="section center" style="padding: 40px;">

        <form action="../backend/admin/category-add.php" method="post" enctype="multipart/form-data">

            <?php

            if (isset($_SESSION['msg'])) {
                echo '<div class="row" style="background: red; color: white;">
                <div class="col s12">
                    <h6>'.$_SESSION['msg'].'</h6>
                    </div>
                </div>';
                unset($_SESSION['msg']);
            }

            ?>

            <div class="row">
                <div class="col s6" style="">
                            <div class="input-field">
                            <input id="name" name="name" type="text" class="validate" style="color: black; width: 70%">
                            <label for="name" style="color: white;"><b>Category Name :</b></label>
                            </div>
                </div>
              
                </div>
            </div>

            <div class="row">
                <div class="col s12">

                <div class="input-field">
                <input id="desc" name="desc" type="text" class="validate" style="color: black; width: 70%">
                <label for="desc" style="color: white;"><b>Description :</b></label>
                </div>
                
                </div>
            
            </div>
            
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>

            <div class="row">
                <div class="col s12">
                    <div class="section right" style="padding: 15px 10px;">
                        <a href="category.php" class="waves-effect waves-light btn">Dismiss</a>
                    </div>
                    <div class="section right" style="padding: 15px 20px;">
                        <button type="submit" class="waves-effect waves-light btn" name="submit">Add New</button>
                    </div>
                </div>
            </div>
            <div id="display-image">
   
    </div>

        </form>


    </div>

</div>

