<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/index.css">
    <title>Coderfly</title>
  </head>
  <body>
    <!-- Navagation: Home, My Space, Sign In/Sign Up, /Log Out,Search -->
    <?php
      include"navbar.php";
    ?>


    <main>
      <!-- list newest blogs -->
      <div class="post_container">
        <p id="new">Searching Result</p>
        <?php
          require_once("../database/db_credentials.php");
          require_once("../database//database.php");
          $db = db_connect();

          $search = $_GET["search"];

            if($search){
                $sql = "SELECT * FROM blog 
                JOIN users ON blog.userId = users.userId 
                JOIN category ON blog.categoryId = category.categoryId 
                WHERE Title LIKE '%$search%' OR CategoryName LIKE '%$search%' OR Username LIKE '%$search%'";
                
                $result_set = mysqli_query($db, $sql);
            }else{
                header("Location: /Assignment2/public");
            }
          ?>

     <?php while ($row = mysqli_fetch_assoc($result_set)) {   ?>
     <div class="post"> <a class="title" href=<?php echo "viewPost.php?id=" . $row['BlogId']; ?>><?php echo $row["Title"]; ?> </a>
     <div class="information"> <span class="username"><?php echo $row["Username"]; ?> </span>
     <span class="time"><?php echo $row["CreatedOnDate"]; ?> </span></div>
     <p class="categories">Category: <span class="category"><?php echo $row["CategoryName"]; ?></span></p>
     <p>Preview:</p><p class="snippet"><?php echo $row["Content"]; ?>
     <a href=<?php echo "viewPost.php?id=" . $row['BlogId']; ?> class="view_more">view more</a>
     </p></div>
     <?php }      ?>
       


      </div>
      <!-- recommand topics -->
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