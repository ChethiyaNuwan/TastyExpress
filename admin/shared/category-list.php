


<?php

include_once "../backend/connect-db.php";
//$sql = "SELECT * FROM admin";


$sql = 'SELECT * FROM categories';

$result = mysqli_query($conn, $sql);
$arr_all =  $result->fetch_all(MYSQLI_ASSOC);




?>
	
  <div class="categorydashbord" >
  <div class="category-dashbord-internal">

	<div class="category-heading">
  <h1 class="categoryh1">CATEGORIES</h1>
</div>



<div class="category-add" >
  <a href="CategoryADD.php" ><button class="link-button-new">Add New</button></a>
</div>
<div class="thead">
        
            <div>Name</div>
            <div style="    padding-right: 40px;">Image</div>
            <div class="description-head"> Description</div>
            <div></div>
        
</div>
<div class="table-container" style="padding: 20px;">

  <table class="category-table">
     

      <tbody>
        <?php

          foreach ($arr_all as $key) {

        ?>
        <tr>
          <td class="name-cell"><center><?php echo $key['name']; ?></center></td>
          <td><center><img width="100" src="../images/category/<?php echo $key['image_path']; ?>"></center></td>
          <td class="description-cell"><center><?php echo $key['description']; ?></center></td>
            <td><center><a href="../backend/admin/category-delete.php?id=<?php echo $key['id'].'&path='.$key['image_path'] ?>"><span class="new badge" data-badge-caption="">Delete</span></a></center></td>
        </tr>

        <?php } ?>
       
      </tbody>
    </table>
</div>
<?php 
if (isset($_SESSION['category_msg'])) {
  echo '<div class="section center" style="margin: 5px 35px;"><div class="row" style="background: red; color: white;">
  <div class="col s12">
      <h6>'.$_SESSION['category_msg'].'</h6>
      </div>
  </div></div>';
  unset($_SESSION['category_msg']);
}?>
</div>

</div>