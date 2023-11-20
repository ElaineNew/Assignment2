  <!-- Created by Jiaying Qiu -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/form.css">
    <script src="../script/signin.js" defer></script>
    <title>Sign In</title>
  </head>
  <body>
        <!-- Navagation: Home, My Space, Sign In/Sign Up, /Log Out,Search -->
  <?php
    include"navbarEm.php";
  ?>

    <div class="sign_container">
      <img src="../images/signin.png" alt="Coderfly, where creativity soar">
      <h1>Please Sign In</h1>
      <!-- sign in with email and password -->
      <form action="../../private/server/form_signin.php" id="signin-form" onsubmit="return validate()" method="POST">
        <div>
          <label for="email">Email</label>
          <input type="email" name="email" id="email">
        </div>

        <div>
          <label for="password">Password</label>
          <input type="password" name="password" id="password">
        </div>

        <div>
          <button  type="submit" id="submitBtn" class="btn">Sign In</button>
          <button  type="reset" id="resetBtn" class="btn">Reset</button>
        </div>
        <p>Don't have an account? Please <a href="signup.php">sign up</a></p>

      </form>
    </div>


    
    <!-- footer -->
    <?php
      include"footerEm.php";
    ?>
  </body>
</html>