  <!-- Created by Jiaying Qiu -->

<?php
session_start(); 
require_once('../../public/database/db_credentials.php');
require_once('../../public/database/database.php');
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

    // $sql_updatePost = "UPDATE blog SET Title = '$title', CreatedOnDate = curdate(), Content = '$content', CategoryId = '$categoryId' WHERE BlogId = '$id'";
    // $post_result_set = mysqli_query($db, $sql_updatePost);


    $sql_updatePost = "UPDATE blog SET Title = ?, CreatedOnDate = CURDATE(), Content = ?, CategoryId = ? WHERE BlogId = ?";
    $stmt = mysqli_prepare($db, $sql_updatePost);

    mysqli_stmt_bind_param($stmt, "ssii", $title, $content, $categoryId, $id);

    // Execute the statement
    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        // Query executed successfully
        header("Location: /Assignment2/public/pages/viewPost.php?id=$id");
    } else {
        // Query failed
        echo "Error updating post: " . mysqli_error($db);
    }

    // header("Location: /Assignment2/public/pages/viewPost.php?id=$id");

    // Close the database connection
    db_disconnect();
}else{
    header("Location: /Assignment2/public/pages/editPost");
    db_disconnect();
}



?>


