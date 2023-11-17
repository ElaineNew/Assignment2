<?php
session_start(); 
require_once('../../public/database/db_credentials.php');
require_once('../../public/database/database.php');
$db = db_connect();

$search = $_GET["search"];

if(!$search){
  header("Location: /Assignment2/public");

}else{
  header("Location: /Assignment2/public/pages/searchedPost.php");

}


?>