  <!-- Created by Qina Yu -->

<?php
session_start();
require_once('../../public/database/db_credentials.php');
require_once('../../public/database/database.php');


$db = db_connect();



// Check if the form was submitted and if the necessary data is available
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['new_review'], $_POST['blog_id'])) {
    $comment_content = mysqli_real_escape_string($db, $_POST['new_review']);
    $blog_id = intval($_POST['blog_id']);
    $user_email = mysqli_real_escape_string($db, $_SESSION['user_email']); // This assumes you have user's email saved in the session

    // Find the user ID based on the email
    $sql_findUserId = "SELECT UserId FROM users WHERE Email = '{$user_email}'";
    $user_result_set = mysqli_query($db, $sql_findUserId);

    // require user to login before creating comments
    if (!$user_result_set || mysqli_num_rows($user_result_set) == 0) {
        db_disconnect($db);

        $redirectUrl = "/Assignment2/public/pages/signin.php";
        echo '<script>';
        echo 'alert("You must sign in to leave a review!");';
        echo 'window.location.href = "' . $redirectUrl . '";';
        echo '</script>';
    }

    $user_data = mysqli_fetch_assoc($user_result_set);
    $userId = $user_data['UserId'];

    // Insert the new comment into the database
    $current_date = date('Y-m-d');
    $sql_insertComment = "INSERT INTO comments (CommentedOnDate, CommentContent, BlogId, UserId) VALUES ('{$current_date}', '{$comment_content}', '{$blog_id}', '{$userId}')";
    $comment_result_set = mysqli_query($db, $sql_insertComment);

    if (!$comment_result_set) {
        db_disconnect($db);
        header("Location: /Assignment2/public/pages/viewPost.php?id=" . $blog_id);
    }

    db_disconnect($db);

    // Redirect back to the blog post
    header("Location: /Assignment2/public/pages/viewPost.php?id=" . $blog_id);
    exit;
} else {
    db_disconnect($db);
}
