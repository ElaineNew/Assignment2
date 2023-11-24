  <!-- Created by Jiaying Qiu -->

<?php
session_start(); 
$_SESSION['logged_in'] = false;
$_SESSION['user_email'] = null;
$_SESSION['user_name'] = null;
$_SESSION['user_id'] = null;

require_once('../../public/database/db_credentials.php');
require_once('../../public/database/database.php');
$db = db_connect();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $term = $_POST["term"];


    // Insert user data into the database
    $sql = "INSERT INTO users (Username,Email,Password) VALUES ('$username', '$email','$password')";

    if (mysqli_query($db, $sql)) {
      $_SESSION['logged_in'] = true;
      $_SESSION['user_email'] = $email;
      $_SESSION['user_name'] = $username;

      $sql = "select * from users where Email ='$email'";
      $result_set = mysqli_query($db, $sql);
      $results = mysqli_fetch_assoc($result_set);
      $_SESSION['user_id'] = $results['UserId'];

      header("Location: /Assignment2/public");
      exit();
    } else {
      $_SESSION['logged_in'] = false;
      $_SESSION['user_email'] = null;
      $_SESSION['user_name'] = null;
      $_SESSION['user_id'] = null;
      $redirectUrl = "/Assignment2/public/pages/signup.php";
      echo '<script>';
      echo 'alert("Signup failed, please try again.");';
      echo 'window.location.href = "' . $redirectUrl . '";';
      echo '</script>';
    }
    db_disconnect($db);

}



?>


