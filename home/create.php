<?php include 'header.php'; ?>
<?php
if (isset($_POST['create_blog'])) {
    $username = $_SESSION['user']['username'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sql = "INSERT INTO `php`.`blogs` (`username`, `title`, `content`) VALUES ('$username', '$title', '$content');";
    if ($con->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

?>
<style>
    #title {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
</style>
<script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>
<div class="container-fluid my-2">
    <h1 class="text-center">Start Blogging...</h1>
    <form action="create.php" class="" method="post">
        <input type="text" id="title" name="title" placeholder="Enter your title here..." required>
        <textarea id="mytextarea" name="content" placeholder="Lorem epsum..."></textarea>
        <input type="submit" class="btn btn-primary my-2" value='Done' name="create_blog" />
    </form>
</div>

<?php include 'footer.php'; ?>