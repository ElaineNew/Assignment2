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
    // require user to login before creating post
      if(!isset($_SESSION['user_email'])){
        header("Location: /Assignment2/public/pages/signin.php");
      }
    ?>
    <main>
      <!--create new post -->
      <div class="post_container">
        <form action="../../private/server/create_post.php" onsubmit="return validate()" method = "POST">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" >
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
            <textarea name="new_post" id="new_post" cols="100" rows="20"></textarea>
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