  <!-- Created by Jiaying Qiu -->
  
  <?php  
    session_start(); 
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // User is logged in, show navigation for logged-in users
    echo
    '<nav class="navbar">
      <span class="logo"><a href="/Assignment2/public/index.php"><img src="/Assignment2/public/images/logo.png" alt="logo"></a></span>
      <ul>
        <div>
          <li><a href="/Assignment2/public/index.php">Home</a></li>
          <li><a href="/Assignment2/public/pages/createPost.php">New Notes</a></li>
          <li><a href="/Assignment2/public/pages/userPosts.php">My Notes</a></li>
          <li id="lg-searchbar" class="lg-search">
            <form action="/Assignment2/public/pages/searchedPost.php" id="search_bar" method="GET">
              <input type="text" name="search" id="search">
              <button type="submit">Search</button>
            </form>
          </li>
          </div>
          <li><span class = "welcome">Welcome! '. $_SESSION['user_name'].
          '   |</span><a href="/Assignment2/private/server/logout.php">log out</a>
        </li>
      </ul>
    </nav>
    <nav class="navbar sm-search">
    <li id="searchbar" >
    <form action="/Assignment2/public/pages/searchedPost.php" id="search_bar" method="GET">
      <input type="text" name="search" id="search">
      <button type="submit">Search</button>
    </form>
  </li>
    </nav>
    ';
} else {
    // User is not logged in, show navigation for non-logged-in users
    echo
    '<nav class="navbar">
      <span class="logo"><a href="/Assignment2/public/index.php"><img src="/Assignment2/public/images/logo.png" alt="logo"></a></span>
      <ul>
      <div>
          <li><a href="/Assignment2/public/index.php">Home</a></li>
          <li><a href="/Assignment2/public/pages/createPost.php">New Notes</a></li>
      </div>
        <li>
          <a href="/Assignment2/public/pages/signin.php">sign up/sign in</a>
        </li>
      </ul>
    </nav>';
}
?>
