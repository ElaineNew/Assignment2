<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/createPost.css">
    <script src="../script/createPost.js" defer></script>
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
    if(!isset($_GET['id'])) {
        header("Location: /Assignment2/public/");
      }
      $id = $_GET['id'];
    $id = $_GET['id'];
    //3. prepare query
    $sql = "SELECT * FROM blog JOIN users ON(blog.userId = users.userId) JOIN category ON(blog.categoryId = category.categoryId) WHERE blog.BlogId = '$id'";
    //4. execute the query
    $result_set = mysqli_query($db, $sql);
    $results = mysqli_fetch_assoc($result_set)
    ?>

    <main>
      <!--create new post -->
      <div class="post_container">
        <form action="../../private/server/edit_post.php?id=<?php echo $id?>" onsubmit="return validate()" method = "POST">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?php echo $results["Title"] ?>">
            <div class="category_selection">
                Category:
                <input type="radio" name="category" value="Javascript" > 
                <label for="web">Javascript</label>
                <input type="radio" name="category" value="Java"> 
                <label for="web">Java</label>
                <input type="radio" name="category" value="PHP"> 
                <label for="web">PHP</label>
                <input type="radio" name="category" value="HTML"> 
                <label for="web">HTML</label>
                <input type="radio" name="category" value="CSS"> 
                <label for="web">CSS</label>
            </div>
            Content:
            <textarea name="new_post" id="new_post" cols="100" rows="20"> <?php echo $results["Content"] ?></textarea>
            <input type="submit" name="submit_post" id="submit_post" class="btn" value="submit">
        </form>
      </div>


      <!-- recommand topics -->
      <?php
      include"sideEm.php";
    ?>
    </main>



    <!-- footer -->
    <?php
      include"footerEm.php";
    ?>

  </body>
</html>