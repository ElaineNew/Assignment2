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
  $email = $_SESSION['user_email'];
  $userId = $_SESSION['user_id'];

  $sql_findCategoryId = "Select CategoryId from category WHERE CategoryName = '$category'";
  $category_result_set = mysqli_query($db, $sql_findCategoryId);
  $category_results = mysqli_fetch_assoc($category_result_set);
  $categoryId = $category_results['CategoryId'];

//allow user to input special characters
    $sql_insertNewPost = "INSERT INTO blog (Title, CreatedOnDate, Content, CategoryId, UserId) VALUES (?, CURDATE(), ?, ?, ?)";
$stmt = mysqli_prepare($db, $sql_insertNewPost);

if ($stmt) {
    // Bind parameters "ssii" string string integer integer
    mysqli_stmt_bind_param($stmt, "ssii", $title, $content, $categoryId, $userId);

    // Execute the statement
    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        // Query executed successfully
        $postId = mysqli_insert_id($db); // Get the ID of the last inserted row
        header("Location: /Assignment2/public/pages/viewPost.php?id=$postId");
    } else {
        // Query failed
        echo "Error inserting new post: " . mysqli_error($db);
    }
    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Statement preparation failed
    echo "Error preparing statement: " . mysqli_error($db);
}

    $id = mysqli_insert_id($db);
    header("Location: /Assignment2/public/pages/viewPost.php?id=$id");

    // Close the database connection
    db_disconnect($db);
}else{
    header("Location: /Assignment2/public/pages/createPost");
    // Close the database connection
    db_disconnect($db);
}



?>


