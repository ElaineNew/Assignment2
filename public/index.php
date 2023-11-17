<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
    <title>Coderfly</title>
  </head>
  <body>
    <!-- Navagation: Home, My Space, Sign In/Sign Up, /Log Out,Search -->
    <?php
      include"../public/pages/navbar.php";
    ?>
    <!-- slogan -->
    <header>
      <p class="slogan">Good notes are better than a good memory.</p>
      <button> <a href="pages/createPost.php">Start Taking Notes</a></button>
      <img src="images/technology.jpg" alt="technology_pic">
    </header>
    


    <main>
      <!-- list newest blogs -->
      <div class="post_container">
        <p id="new">Newest Posts</p>
        <!-- <div class="post">
          <a class="title" href="pages/viewPost.php">What is POLYMORPHISM</a>
          <div class="information">
            <span class="username">Jiaying Qiu</span>
            <span class="time">Nov 2, 2023</span>
          </div>
          <p class="categories">Category: <span class="category">Java</span></p>
          <p>Preview:</p>
          <p class="snippet">Polymorphism is a very important concept in Java. It enables methods to take different actions upon the object.
            There are two types of polymorphism: compile time and runtime... <a href="viewPost.html" class="view_more">view more</a>
          </p>
        </div> -->
        <?php
        session_start(); 
          require_once("../public/database/db_credentials.php");
          require_once("../public/database//database.php");
          $db = db_connect();
          //3. prepare query
          $sql = "SELECT * FROM blog JOIN users ON(blog.userId = users.userId) JOIN category ON(blog.categoryId = category.categoryId)";

          //4. execute the query
          $result_set = mysqli_query($db, $sql);
          ?>

          <?php while ($row = mysqli_fetch_assoc($result_set)) {   ?>
            <div class="post"> <a class="title" href=<?php echo "pages/viewPost.php?id=" . $row['BlogId']; ?>><?php echo $row["Title"]; ?> </a>
            <div class="information"> <span class="username"><?php echo $row["Username"]; ?> </span>
            <span class="time"><?php echo $row["CreatedOnDate"]; ?> </span></div>
            <p class="categories">Category: <span class="category"><?php echo $row["CategoryName"]; ?></span></p>
            <p>Preview:</p><p class="snippet"><?php echo $row["Content"]; ?>
            <a href=<?php echo "pages/viewPost.php?id=" . $row['BlogId']; ?> class="view_more">view more</a>
          </p></div>
            <?php }      ?>
       


      </div>
      <!-- recommand topics -->
      <?php
      include"pages/sideEm.php";
    ?>

    </main>



    <!-- footer -->
    <?php
      include"pages/footer.php";
    ?>

  </body>
</html>