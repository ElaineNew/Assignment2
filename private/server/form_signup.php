<?php
session_start(); 
require_once('db_credentials.php');
require_once('database.php');
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

      header("Location: /Assignment2/public");
      exit();
    } else {
      $_SESSION['logged_in'] = false;
      $_SESSION['user_email'] = null;
      echo "Error: " . $sql . "<br>" . mysqli_error($db);
      header("Location: /Assignment2/public/pages/signup.php");
    }

    // Close the database db
    db_disconnect();
}



?>


