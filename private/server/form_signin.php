
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
  $email = $_POST["email"];
  $password = $_POST["password"];

  $sql = "select * from users where Email ='$email'";
  $result_set = mysqli_query($db, $sql);
  $results = mysqli_fetch_assoc($result_set);

  if(!$results || !isset($results['Password']) || $password !== $results['Password']){
    $redirectUrl = "/Assignment2/public/pages/signin.php";
    echo '<script>';
    echo 'alert("Wrong email or password, please try again.");';
    echo 'window.location.href = "' . $redirectUrl . '";';
    echo '</script>';
  }else{
    $_SESSION['logged_in'] = true;
    $_SESSION['user_email'] = $email;
    $_SESSION['user_id'] = $results['UserId'];
    $_SESSION['user_name'] = $results['Username'];
 

    header("Location: /Assignment2/public");
    db_disconnect($db);
    // exit();
  }
}


?>


