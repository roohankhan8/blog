<?php
session_start();
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https://";
} else {
    $url = "http://";
    $url .= $_SERVER['HTTP_HOST'];
    $url .= $_SERVER['REQUEST_URI'];
    $url;
}
$page = $url;
$sec = '1';

$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);
if (!$con) {
    die("connection to this database failed due to" . mysqli_connect_error());
}

// Login process
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM php.users WHERE email='$email'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = $row;
            header("Location: ../home/index.php");
        } else {
            $_SESSION["invalid_password"] = true;
            header("Location: login.php");
            exit();
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
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if ($password != $confirm_password) {
        $_SESSION['error'] = 'Passwords do not match!';
        header("Location: signup.php");
        exit();
    } else {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $confirm_password = password_hash($_POST['confirm_password'], PASSWORD_DEFAULT);    
        $check_user = "SELECT * FROM php.users WHERE email='$email'";
        $result = $con->query($check_user);
        if ($result->num_rows > 0) {
            $_SESSION['error'] = 'Email is already taken!';
            header("Location: signup.php");
            exit();
        } else {
            $_SESSION['success'] = 'Account created successfully!';
            $sql = "INSERT INTO `php`.`users` (`first_name`, `last_name`, `email`, `password`) VALUES ('$first_name', '$last_name', '$email', '$password');";
            if ($con->query($sql) === TRUE) {
                header("Location: login.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        }
    }
}

// Logout process
if (isset($_GET['logout'])) {
    unset($_SESSION['email']);
    session_destroy();
    header("Location: ../home/index.php");
    exit;
}
