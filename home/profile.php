<?php include 'header.php'; ?>
<?php
$user = $_SESSION['user'];
$email = $_SESSION['user']['email'];
$sql = "SELECT * FROM php.blogs where email= '$email'";
$result = $con->query($sql);
?>
<div class="container-fluid">
    <div class="p-2 m-2 w-full">
        <h1 class="text-center">Hi,
            <?php
            echo ucfirst($user["first_name"]) . ' ' . ucfirst($user["last_name"]);
            ?>
        </h1>
        <h2 class="text-center">Your Blogs</h2>
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
                        <p>'. $row['content'] .'</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span><small>By: '. $row['email'] .'</small></span>
                        <a href="blog.php/' . $row['sno'] . '" class="btn btn-primary">Continue</a>
                    </div>
                </div>
            </div>
                ';
        }
    } else {
        echo "You haven't created any blogs yet. Create your first blog now!";
    }
    echo '</div>';
    ?>
</div>
<?php include 'footer.php'; ?>