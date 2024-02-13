<?php
session_start();
// Set connection variables
$server = "localhost";
$username = "root";
$password = "";

// Create a database connection
$con = mysqli_connect($server, $username, $password);
// Check for connection success
if (!$con) {
    die("connection to this database failed due to" . mysqli_connect_error());
}
// echo "Success connecting to the db";

// Login process
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM php.users WHERE email='$email'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            header("Location: index.php");
        } else {
            echo "Invalid email or password";
            echo '<br>';
            echo $row['password'];
            echo '<br>';
            echo password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
    } else {
        echo "Invalid email or password";
    }
}
// Sign-up process
if (isset($_POST['signup'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO `php`.`users` (`first_name`, `last_name`, `email`, `password`) VALUES ('$first_name', '$last_name', '$email', '$password');";

    if ($con->query($sql) === TRUE) {
        echo "User registered successfully";
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
// Logout process
if (isset($_GET['logout'])) {
    unset($_SESSION['email']);
    session_destroy();
    header("Location: index.php");
    exit;
}
