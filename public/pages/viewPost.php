  <!-- Created by Qina Yu -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/viewPost.css">
    <title>Coding Notes</title>
  </head>
  <body>
    <!-- Navagation: Home, My Space, Sign In/Sign Up, /Log Out,Search -->
    <?php
      include"navbarEm.php";
    ?>

<?php
  require_once('../database/db_credentials.php');
  require_once('../database/database.php');
  $db = db_connect();
?>
<?php
  $id = $_GET['id'];
  //3. prepare query
  $sql = "SELECT * FROM blog JOIN users ON(blog.userId = users.userId) JOIN category ON(blog.categoryId = category.categoryId) WHERE blog.BlogId = '$id'";
  //4. execute the query
  $result_set = mysqli_query($db, $sql);
  $results = mysqli_fetch_assoc($result_set)

?>
    <main>
      <!-- list newest blogs -->
      <div class="post_container">
        <div class="viewpost">
            <div class="post">
            <h1 class="title"><?php echo $results['Title'] ?></h1>
 
            <div class="information">
                <span class="username"><?php echo $results['Username'] ?></span>
                <span class="time"><?php echo $results['CreatedOnDate'] ?></span>
            </div>

            <div class="content">
                <p>
                <?php echo $results['Content'] ?>
                </p>
                <img src="../images/coding.jpg" alt="#" class="post_img">
            </div>
            <p class="categories">Category: <span class="category"><?php echo $results['CategoryName'] ?></span></p>
            </div>
            <?php
        if (isset($_SESSION['user_email']) && $_SESSION['user_email'] === $results['Email']) {
        ?>
        <a class="btn edit_btn" id="edit" href= <?php echo "editPost.php?id=".$id?>>Edit</a>
        <a class="btn delete_btn" id="delete" href= <?php echo "../../private/server/delete_post.php?id=".$id?>> Delete</a>
        <?php } ?>
        </div>
        
    

        <!--leave review -->
        <form action="../../private/server/submit_comment.php" method="POST" class="review_form">
        <input type="hidden" name="blog_id" value="<?php echo $id; ?>" />
        <div class="leave_review">

          <p>Leave a new review!</p>
          <div>
            <textarea name="new_review" id="new_review" cols="80" rows="10"></textarea>
          </div>
          <input type="submit" name="submit_review" id="review_btn" class="btn">

        </div>
      </form>


      <!-- list reviews -->
      <?php
      $blog_id = $_GET['id'];
      //3. prepare query add ? as placeholders for variables
      $sqlComments = "SELECT comments.*, users.FirstName, users.LastName, users.Username FROM comments 
                      INNER JOIN users ON comments.UserId = users.UserId 
                      WHERE BlogId = ? 
                      ORDER BY CommentedOnDate DESC";
      $stmt = $db->prepare($sqlComments); // Use the correct $sqlComments variable
      $stmt->bind_param("i", $blog_id); // Bind the $blog_id parameter
      $stmt->execute();
      $result = $stmt->get_result();

      ?>
      <div class="reviews">
        <?php
        $loggedInUserId = $_SESSION['user_id'] ?? null;
        if ($result->num_rows > 0) {
          // Output each comment
          while ($comment = $result->fetch_assoc()) {
        ?>
            <div class="review">
              <p><?php echo $comment['CommentContent'] ?></p>
              <div class="information">
      <span class="username"><?php echo $comment['Username']; ?></span>
      <span class="time"><?php echo $comment['CommentedOnDate'] ?></span>

      <br>
      <?php
      // Show delete button if the comment belongs to the logged-in user
      if ($loggedInUserId == $comment['UserId']) { ?>

        <span class="time"><?php echo '
        <a href="../../private/server/delete_comment.php?comment_id=' . $comment['CommentId'] . '&blog_id=' . $blog_id . '" onclick="return confirm(\'Are you sure you want to delete this comment?\');">
         &#x1F5D1; Delete</a>'; ?></span>

      <?php }    ?>
              </div>
            </div>
        <?php
          }
        } else {
          echo '<p>No comments yet.</p>';
        }
        ?>
      </div>
    </div>

    <?php
      include"sideEm.php";
    ?>
    </main>

    <?php db_disconnect($db);?>

    <!-- footer -->
    <?php
      include"footerEm.php";
    ?>
  </body>
</html>