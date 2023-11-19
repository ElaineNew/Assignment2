<?php
session_start(); 
require_once('../../public/database/db_credentials.php');
require_once('../../public/database/database.php');
$db = db_connect();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  //3. prepare query
  $sql = "select * from users where Email ='$email'";
  //4. execute the query
  $result_set = mysqli_query($db, $sql);
  //5. process the result
  $results = mysqli_fetch_assoc($result_set);

  if(!$results || !isset($results['Password']) || $password !== $results['Password']){
    $_SESSION['logged_in'] = false;
    $_SESSION['user_email'] = null;
    $_SESSION['login_error'] = "Incorrect email or password.";

    echo "fail".$_SESSION['logged_in'];
    header("Location: /Assignment2/public/pages/signin.php");
    // exit();
  }else{
    $_SESSION['logged_in'] = true;
    $_SESSION['user_email'] = $email;
    $_SESSION['user_id'] = $results['UserId'];

    header("Location: /Assignment2/public");
    // exit();
  }


}


?>


