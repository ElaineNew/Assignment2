  <!-- Created by Qina Yu -->

<?php
// Start the session
session_start();

// Change the session variable to false
$_SESSION['logged_in'] = false;
$_SESSION['user_email'] = null;
$_SESSION['user_name'] = null;
$_SESSION['user_id'] = null;


session_destroy();


// Redirect to the login page or any other page you prefer
header("Location: /Assignment2/public");
db_disconnect($db);
exit();

?>