<?php include 'header.php'; ?>
<?php
if (isset($_GET['id'])) {
    $blogId = $_GET['id'];
    $sql = "SELECT * FROM php.blogs where sno='$blogId'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
} else {
    echo "Invalid request";
}

?>
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <a href="index.php">
            <button class="btn btn-primary text-white mt-2">Back</button>
        </a>
        <a href="profile.php?username=<?php echo $row['username']; ?>">
            <button class="btn btn-primary text-white mt-2">More from Author</button>
        </a>
    </div>
    <div class="p-2 my-2 border">
        <?php
        if ($row) {
            echo "
            <h3 class='text-center'>" . $row["title"] . "</h3><hr>
            <div>" . $row["content"] . "</div><hr>
            <div class='d-flex justify-content-between align-items-start p-1'>
            <small class=''>Posted by: " . $row["username"] . "</small>
            <small class=''>On: " . $row["date_created"] . "</small>
            </div>
            ";
        }
        ?>
    </div>
</div>
<?php include 'footer.php'; ?>