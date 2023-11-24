  <!-- Created by Jiaying Qiu -->

<?php
session_start(); 
require_once('../../public/database/db_credentials.php');
require_once('../../public/database/database.php');
$db = db_connect();

$id = $_GET['id'];
  $sql_deletecomments = "DELETE FROM COMMENTS WHERE BlogId = '$id'";
  $result_set = mysqli_query($db, $sql_deletecomments);

  $sql_deleteblog = "DELETE FROM blog WHERE BlogId = '$id'";
  $result_set = mysqli_query($db, $sql_deleteblog);

  header("Location: /Assignment2/public");
  db_disconnect($db);

?>