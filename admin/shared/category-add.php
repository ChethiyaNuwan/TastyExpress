


<div class="categorydashbord" >
  <div class="category-dashbord-internal">

	<div class="category-heading">
  <h3 class="categoryh1">ADD NEW CATEGORY
</h3>
	</div>
    


    <div class="section center" style="padding: 40px;">
    

        <form class="cardnew" action="../backend/admin/category-add.php" method="post" enctype="multipart/form-data">

       

            <div class="input_field">
                <div>
                            <div class="input-field">
                            <label for="name" style="color: black;"><b>Category Name :</b></label>
                            <input id="name" name="name" type="text" class="validate" style="color: black; width: 100%">

                            </div>
                </div>
              
            </div>

            <div class="input_field" >
                <div >

                <div class="input-field">
                <label for="desc" style="color: black;"><b>Description :</b></label>

                <input id="desc" name="desc" type="text" class="validate" style="color: black; width: 100%">
                </div>
                
                </div>
            
            </div>
            <div class="input_field">
                <div >

                <div class="input-field">
                <label for="image" style="color: black;"><b>Uplaod Image :</b></label>

                <input id="image" class="form-control" type="file" accept="image/*" name="uploadfile" value="" style="color: black; width: 100%">
                </div>
                
                </div>
            
            </div>
            <div class="input_field">
                <div>
            
           
            <div class="input_field-x">
                <div class="twobutton">
                    <div  >
                        <button class="link-button-new" style="color: black;background-color:red "><a href="category.php" class="waves-effect waves-light btn">Dismiss</a></button>
                    </div>
                    <div >
                        <button type="submit" class="link-button-new" name="submit">Add New</button>
                    </div>
                </div>
            </div>
  
   
    </div>

        </form>
        <span class="error_x">
    <?php echo isset($_GET['food_add_msg']) ? $_GET['food_add_msg']:''?>
</span>

    </div>

</div>

