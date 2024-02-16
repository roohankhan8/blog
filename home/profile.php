<?php include 'header.php'; ?>
<?php
if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $sql = "SELECT * FROM php.blogs where username='$username'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
} else {
    echo "Invalid request";
}
$user = $_SESSION['user'];
$sql = "SELECT * FROM php.blogs where username= '$username'";
$result = $con->query($sql);
?>
<div class="container-fluid">
    <div class="p-2 m-2 w-full">
        <?php
        if ($username == $user['username']) {
            echo '
            <h1 class="text-center">Hi, ' .
                ucfirst($user["first_name"]) . ' ' . ucfirst($user["last_name"]) . '
            </h1>
            <h2 class="text-center">Your Blogs</h2>
            ';
        } else {
            echo '
            <h1 class="text-center">Blogs from: ' . $username . '</h1>
            ';
        }
        ?>
    </div>
    <?php
    echo '<div class="cards">';
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="card shadow" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">' . $row['title'] . '</h5>
                    <div id="content-box" class=" card-text text-muted small">
                        <p>' . $row['content'] . '</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span><small>By: ' . $row['username'] . '</small></span>
                        <a href="blog.php?id=' . $row['sno'] . '" class="btn btn-primary">Continue</a>
                    </div>
                </div>
            </div>
                ';
        }
    } else {
        if ($username == $user['username']) {
            echo '
            <h1 class="text-center">
                You haven\'t created any blogs yet. Create your first blog now!
            </h1>
            ';
        } else {
            echo '
            They haven\'t created any blogs yet.
            ';
        }
    }
    echo '</div>';
    ?>
</div>
<?php include 'footer.php'; ?>