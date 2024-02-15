<?php include 'header.php'; ?>
<?php
$user = $_SESSION['user'];
?>
<div class="container-fluid">
    <div class="d-flex p-2 m-2 justify-content-evenly w-full align-content-center">
        <h1 class="text-center">Hi,
            <?php
            echo ucfirst($user["first_name"]) . ' ' . ucfirst($user["last_name"]);
            ?>
        </h1>
        <div>
            <a href="create.php" class="btn btn-primary text-center shadow">
                Create Blog
            </a>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>

