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
      include"navbar.php";
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
            </div>
        <hr>
            <p class="categories">Category: <span class="category"><?php echo $results['CategoryName'] ?></span></p>
            </div>
        </div>
        <?php
        if (isset($_SESSION['user_email']) && $_SESSION['user_email'] === $results['Email']) {
        ?>
        <a class="btn edit_btn" id="edit" href= <?php echo "editPost.php?id=".$id?>>Edit</a>
        <a class="btn delete_btn" id="delete" href= <?php echo "../../private/server/delete_post.php?id=".$id?>> Delete</a>
        <?php } ?>
        <hr>

        <!--leave review -->

        <div class="leave_review">
            <form action="#" class="review_form">
                <p>Leave a new review!</p>
                <div>
                  <textarea name="new_review" id="new_review" cols="80" rows="10"></textarea>
                </div>
                <input type="submit" name="submit_review" id="review_btn" class="btn">
            </form>
        </div>


        <!-- list reviews -->

        <div class="reviews">
          <div class="review">
            <p>excellent</p>
            <div class="information">
              <span class="username">Jiaying Qiu</span>
              <span class="time">Nov 2, 2023</span>
          </div>
          </div>
          <div class="review">
            <p>good</p>
            <div class="information">
              <span class="username">Jiaying Qiu</span>
              <span class="time">Nov 2, 2023</span>
          </div>
          </div>
          <div class="review">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, sed vel voluptate tempore cumque repellat quaerat molestiae, fuga deserunt quod porro fugiat libero expedita. Maiores totam molestiae sunt ipsum quisquam?</p>
            <div class="information">
              <span class="username">Jiaying Qiu</span>
              <span class="time">Nov 2, 2023</span>
          </div>
          </div>
        </div>

    </div>



    <?php
      include"sideEm.php";
    ?>
    </main>



    <!-- footer -->
    <?php
      include"footer.php";
    ?>
  </body>
</html>