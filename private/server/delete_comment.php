
  <!-- Created by Qina Yu -->
  <?php
session_start();
require_once('../../public/database/db_credentials.php');
require_once('../../public/database/database.php');
$db = db_connect();

// Check if the user is logged in and the comment_id is present
if (isset($_SESSION['user_id']) && isset($_GET['comment_id']) && isset($_GET['blog_id'])) {
  $commentId = $_GET['comment_id'];
  $loggedInUserId = $_SESSION['user_id'];
  $blogId = $_GET['blog_id'];

  // Delete the comment if it belongs to the logged-in user
  $deleteQuery = "DELETE FROM comments WHERE CommentId = '{$commentId}' AND UserId = '{$loggedInUserId}'";
  mysqli_query($db, $deleteQuery);

  // Redirect back to the blog post page
  header("Location: /Assignment2/public/pages/viewPost.php?id={$blogId}");
  exit;
}
db_disconnect($db); 
