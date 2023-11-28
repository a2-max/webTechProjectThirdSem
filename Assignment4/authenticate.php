<?php
session_start();

// Replace with your actual username and password
$valid_username = "admin";
$valid_password = "admin";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    if ($input_username === $valid_username && $input_password === $valid_password) {
        // Authentication successful, set a session variable to mark the user as logged in
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $input_username;

        // Redirect to a secure page (e.g., dashboard.php)
        header("Location: dashboard.php");
        exit();
    } else {
        // Authentication failed, display an error message
        echo "Invalid username or password. Please try again.";
    }
}
?>
