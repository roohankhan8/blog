<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="../styles/registration.css" />
</head>

<body>
  <div class="container">
    <h2>Login</h2>
    <form action="registration.php" method="post">
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />
      <input type="submit" value="Login" name="login" />
    </form>
    <?php
    session_start();
    if (isset($_SESSION['success'])) {
      echo "
      <p class='or' style='color:blue;'>Account created successfully!</p>
      ";
      unset($_SESSION['success']);
    } elseif (isset($_SESSION['invalid_password'])) {
      echo "
      <p class='or' style='color:red;'>Invalid password!</p>
      ";
      unset($_SESSION['invalid_password']);
    }
    ?>
    <div class="separator"><span>OR</span></div>
    <p class="or">Don't have an account? <a href="signup.php">Sign up</a></p>
  </div>
</body>

</html>