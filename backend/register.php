<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the confirm password matches the password
    if ($password !== $confirm_password) {
        // Redirect to the register page with the error message
        header("Location: ../user/register.php?error=Passwords do not match!");
    } else {
        // Redirect to the register page with the success message
        header("Location: ../user/register.php?success=Registration successful!");
    }
}
?>
