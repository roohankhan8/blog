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
$sec = '105';

$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);
if (!$con) {
    die("connection to this database failed due to" . mysqli_connect_error());
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="refresh" content="<?php echo $sec ?>" URL="<?php echo $page ?>" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blogs</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/sqfylf9svecb5jg89junh6xt4ivh0l3tt8zfz0zdfrcs56x6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
    <?php include 'navbar.php'; ?>