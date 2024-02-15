<?php include 'header.php'; ?>
<?php
if (isset($_POST['blog'])) {
    $email=$_SESSION['user']['email'];
    $blog=$_POST['blog'];
    echo''.$blog.''.$email;
}

?>
<script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>
<div class="container-fluid my-2">
    <h1 class="text-center" >Start Blogging...</h1>
    <form action="create.php" method="post">
        <textarea id="mytextarea" name="blog" placeholder="Lorem epsum..."></textarea>
        <button type="submit" class="btn btn-primary my-2">Done</button>
    </form>
</div>

<?php include 'footer.php'; ?>