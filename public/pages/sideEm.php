  <!-- Created by Qina Yu -->

<aside class="sidebar">
  <section class="recommend">
    <p>Most popular notes.</p>
    <hr>
    <?php
    $db = db_connect();
    $sql = "SELECT blog.*, COUNT(comments.CommentId) AS comment_count FROM blog JOIN comments ON(blog.blogId = comments.blogId) GROUP BY blog.blogId ORDER BY comment_count DESC
    LIMIT 5";
    $result_set = mysqli_query($db, $sql);
    ?>

    <ul class="posts">
      <?php while ($row = mysqli_fetch_assoc($result_set)) {   ?>
      <li><a class="post" href="/Assignment2/public/pages/viewPost.php?id=<?php echo $row['BlogId'] ?>"> <?php echo $row['Title'];?></a></li>
      <?php }      ?>
    </ul>
  </section>
  <section class="discover">
    <p>Discover more topics.</p>
    <hr>
    <div class="categories">
      <span class="category"><a href="/Assignment2/public/pages/searchedPost.php?search=CSS">CSS</a></span>
      <span class="category"><a href="/Assignment2/public/pages/searchedPost.php?search=Java">Java</a></span>
      <span class="category"><a href="/Assignment2/public/pages/searchedPost.php?search=PHP">PHP</a></span>
      <span class="category"><a href="/Assignment2/public/pages/searchedPost.php?search=Javascript">Javascript</a></span>
      <span class="category"><a href="/Assignment2/public/pages/searchedPost.php?search=HTML">HTML</a></span>
    </div>
  </section>

</aside>
