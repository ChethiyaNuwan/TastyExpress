


<?php
include_once "../backend/connect-db.php";
//$sql = "SELECT * FROM admin";


$sql = 'SELECT * FROM orders LEFT JOIN foods ON orders.food_id = foods.id';


$result = mysqli_query($conn, $sql);
$arr_all =  $result->fetch_all(MYSQLI_ASSOC);


?>

<div class="dashbord" style="background: #B35458;">

<div class="section">
    <h3>Orders</h3>
</div>

-- LOGIN CHECK

<div class="section center" style="padding: 20px;">
    <table class="centered responsive-table">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>User Name</th>
            <th>Food Name</th>
            <!-- <th>Timestamp</th> -->
            <th>Status</th>
        </tr>
        </thead>

        <tbody>
        <?php

        foreach ($arr_all as $key) {

            $pCheck = $key['status'] == 'Processing';
            $dCheck = $key['status'] == 'Delivering';
            $cCheck = $key['status'] == 'Completed';

            ?>
            <tr>
                <td><?php echo $key['order_id']; ?></td>
                <td><?php echo $key['user_name']; ?></td>
                <td><?php echo $key['fname']; ?></td>
                <!-- <td><?php echo $key['timestamp']; ?></td> -->
                <td>

                    <?php if ($pCheck || $dCheck || $cCheck) {
                        echo '<button disabled>Processing</button>';
                    } else {
                        echo '<button><a href="../backends/admin/update-status.php?order_id=' . $key['order_id'] . '&status=Processing">Processing</a></button>';
                    }
                    ?>
                    <?php if ($dCheck || $cCheck) {
                        echo '<button disabled>Delivering</button>';
                    } else {
                        echo '<button><a href="../backends/admin/update-status.php?order_id=' . $key['order_id'] . '&status=Delivering">Delivering</a></button>';
                    }
                    ?>
                    <?php if ($cCheck) {
                        echo '<button disabled>Completed</button>';
                    } else {
                        echo '<button><a href="../backends/admin/update-status.php?order_id=' . $key['order_id'] . '&status=Completed">Completed</a></button>';
                    }
                    ?>

                </td>

            </tr>

        <?php } ?>

        </tbody>
    </table>
</div>
</div>