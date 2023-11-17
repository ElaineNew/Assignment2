<?php
session_start(); 
require_once('db_credentials.php');
require_once('database.php');
$db = db_connect();


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $title = $_POST["title"];
  $category = $_POST["category"];
  $content = $_POST["new_post"];
  $id = $_GET['id'];

    // Insert user data into the database

    $sql_findCategoryId = "Select CategoryId from category WHERE CategoryName = '$category'";
    $category_result_set = mysqli_query($db, $sql_findCategoryId);
    $category_results = mysqli_fetch_assoc($category_result_set);
    $categoryId = $category_results['CategoryId'];

    $sql_updatePost = "UPDATE blog SET Title = '$title', CreatedOnDate = curdate(), Content = '$content', CategoryId = '$categoryId' WHERE BlogId = '$id'";
    $post_result_set = mysqli_query($db, $sql_updatePost);
    header("Location: /Assignment2/public/pages/viewPost.php?id=$id");

    // Close the database connection
    db_disconnect();
}else{
    header("Location: /Assignment2/public/pages/editPost");
    db_disconnect();
}



?>


