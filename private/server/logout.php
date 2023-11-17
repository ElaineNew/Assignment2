<?php
// Start the session
session_start();

// Change the session variable to false
$_SESSION['logged_in'] = false;
$_SESSION['user_email'] = null;

// Redirect to the login page or any other page you prefer
header("Location: /Assignment2/public/pages/signin.php");
exit();

?>