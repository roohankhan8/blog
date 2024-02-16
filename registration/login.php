<?php include 'header.php'; ?>
<h4>Login</h4>
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
<p class="or">If you do not have an account</p>

<div class="separator"><span><a href="signup.php">Sign up</a></span></div>
</div>
</body>

</html>