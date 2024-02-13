<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login and Signup</title>
  <link rel="stylesheet" href="registration.css" />
</head>

<body>
  <div class="container">
    <h2>Login</h2>
    <form action="registration.php" method="post">
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />
      <input type="submit" value="Login" name="login" />
    </form>
    <div class="separator"><span>OR</span></div>
    <p class="or">Don't have an account? <a href="signup.php">Sign up</a></p>
  </div>
</body>

</html>