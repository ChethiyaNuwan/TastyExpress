


<?php
include_once "../backend/connect-db.php";
//$sql = "SELECT * FROM admin";


$sql = 'SELECT orders.id as id,users.first_name as user_name,foods.name as fname,orders.status as status FROM orders,foods,users where  orders.food_id = foods.id and orders.user_email=users.email';


$result = mysqli_query($conn, $sql);
$arr_all =  $result->fetch_all(MYSQLI_ASSOC);


?>

<div class="orderdashbord" >
  <div class="order-dashbord-internal">

	<div class="order-heading">
		<h1 class="orderh1">ORDERS</h3>
</div>


<div class="order-thead">
        
            <div>Order ID</div>
            
            <div class="order-name"> User</div>
            <div class="order-food-name">Food</div>
            <div class="order-status-head">Status</div>
            
        
</div>

<div class="table-container" style="padding: 20px;">
    <table class="order-table" >
       

        <tbody>
        <?php

        foreach ($arr_all as $key) {

            $pCheck = $key['status'] == 'Processing';
            $dCheck = $key['status'] == 'Delivering';
            $cCheck = $key['status'] == 'Completed';

            ?>
            <tr class="order-row">
                <td class="order-id-cell"><center><?php echo $key['id']; ?></center></td>
                <td class="order-name-cell"><center><?php echo $key['user_name']; ?></center></td>
                <td class="name-cell"><center><?php echo $key['fname']; ?></center></td>
                <!-- <td><?php echo $key['timestamp']; ?></td> -->
                <td>

                    <?php if ($pCheck || $dCheck || $cCheck) {
                        echo '<button disabled>Processing</button>';
                    } else {
                        echo '<button><a href="../backend/admin/update-status.php?id=' . $key['id'] . '&status=Processing">Processing</a></button>';
                    }
                    ?>
                    <?php if ($dCheck || $cCheck) {
                        echo '<button disabled>Delivering</button>';
                    } else {
                        echo '<button><a href="../backend/admin/update-status.php?id=' . $key['id'] . '&status=Delivering">Delivering</a></button>';
                    }
                    ?>
                    <?php if ($cCheck) {
                        echo '<button disabled>Completed</button>';
                    } else {
                        echo '<button><a href="../backend/admin/update-status.php?id=' . $key['id'] . '&status=Completed">Completed</a></button>';
                    }
                    ?>

                </td>

            </tr>

        <?php } ?>

        </tbody>
    </table>
</div>
</div>