<?php
session_start(); 
require_once('db_credentials.php');
require_once('database.php');
$db = db_connect();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $title = $_POST["title"];
  $category = $_POST["category"];
  $content = $_POST["new_post"];
  $email = $_SESSION['user_email'];


    // Insert user data into the database
    $sql_findUserId = "Select UserId from users WHERE Email = '$email'";
    $user_result_set = mysqli_query($db, $sql_findUserId);
    $user_results = mysqli_fetch_assoc($user_result_set);
    $userId = $user_results['UserId'];


    $sql_findCategoryId = "Select CategoryId from category WHERE CategoryName = '$category'";
    $category_result_set = mysqli_query($db, $sql_findCategoryId);
    $category_results = mysqli_fetch_assoc($category_result_set);
    $categoryId = $category_results['CategoryId'];

    $sql_insertNewPost = "INSERT INTO blog (Title, CreatedOnDate, Content, CategoryId, UserId) VALUES ('$title', CURDATE(), '$content', '$categoryId', '$userId')";
    $post_result_set = mysqli_query($db, $sql_insertNewPost);
   

    $id = mysqli_insert_id($db);
    header("Location: /Assignment2/public/pages/viewPost.php?id=$id");

    // Close the database connection
    db_disconnect();
}else{
    header("Location: /Assignment2/public/pages/createPost");
    // Close the database connection
    db_disconnect();
}



?>


