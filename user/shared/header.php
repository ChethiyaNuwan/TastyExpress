<nav class="navbar">
    <span class="navbar-brand"><a href="#">TastyExpress</a></span>
    <span class="nav-list">
            <a href="index.php">Home</a>
            <a href="categories.php">Categories</a>
            <a href="foods.php">Foods</a>
        <?php
        if (isset($_SESSION['user_data'])) {
            echo '<a href="order-summary.php">Orders</a>
                  <a href="../backend/logout.php">Logout</a>
                  <a class="user-name">Hi, ' . $_SESSION['user_data']['first_name'] . '</a>';
        }
        else{
            echo '<a href="register.php">Register</a>
                  <a href="login.php">Login</a>';
        }
        ?>
        </span>
</nav>