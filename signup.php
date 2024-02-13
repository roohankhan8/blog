<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Signup</title>
    <link rel="stylesheet" href="registration.css" />
</head>

<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="registration.php" method="post">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Sign Up" name="signup">
        </form>
        <div class="separator"><span>OR</span></div>
        <p class="or">Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>

</html>