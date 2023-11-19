<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/form.css">
    <script src="../script/signup.js" defer></script>
    <title>Sign Up</title>
  </head>
  <body>
        <!-- Navagation: Home, My Space, Sign In/Sign Up, /Log Out,Search -->
  <?php
    include"navbarEm.php";
  ?>

    <div class="sign_container">
      <img src="../images/signin.png" alt="Coderfly, where creativity soar">
      <h1>Please Sign Up</h1>

      <!-- sign up with name, email and password -->
      <form action="../../private/server/form_signup.php" id="signup-form" onsubmit="return validate()" method="post">
        <div>
          <label for="username">Username</label>
          <input type="username" name="username" id="username">
        </div>

        <div>
          <label for="email">Email</label>
          <input type="email" name="email" id="email">
        </div>

        <div>
          <label for="password">Password</label>
          <input type="password" name="password" id="password">
        </div>

        <div class="checkbox_group">
          <input type="checkbox" name="term" id="term">
          <label for="term">Click to agree to all the terms and conditions.</label>  
        </div>
     
        <div>
          <button  type="submit" id="submitBtn" class="btn">Sign Up</button>
          <button  type="reset" id="resetBtn" class="btn">Reset</button>
        </div>
        
        <p>Already have an account? Please <a href="signin.php">sign in</a></p>
      </form>
    </div>



    
    <!-- footer -->
    <?php
      include"footerEm.php";
    ?>
  </body>
</html>