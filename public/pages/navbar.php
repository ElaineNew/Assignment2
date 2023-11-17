  <?php  
    session_start();  
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // User is logged in, show navigation for logged-in users

    echo
    '<nav class="navbar">
      <span class="logo"><a href="../index.php"><img src="../images/logo.png" alt="logo"></a></span>
      <ul>
        <div>
          <li><a href="../index.php">Home</a></li>
          <li><a href="createPost.php">New Notes</a></li>
          <!-- <li><a href="myspace.html">My Space</a></li> -->
          <li id="searchbar">
            <input type="text" name="search" id="search">
            <button>Search</button>
          </li>

          <li>
          <a href="../../private/server/logout.php">log out</a>
        </li>
        </div>
      </ul>
    </nav>';
} else {
    // User is not logged in, show navigation for non-logged-in users
    echo
    '<nav class="navbar">
      <span class="logo"><a href="../index.php"><img src="../images/logo.png" alt="logo"></a></span>
      <ul>
        <div>
          <li><a href="../index.php">Home</a></li>
          <li><a href="createPost.php">New Notes</a></li>
          <!-- <li><a href="myspace.html">My Space</a></li> -->
          <li id="searchbar">
            <input type="text" name="search" id="search">
            <button>Search</button>
          </li>
        </div>

        <li>
          <a href="signin.php">sign up/sign in</a>
        </li>
      </ul>
    </nav>';
}
?>
