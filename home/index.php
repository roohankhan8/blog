<?php include 'header.php'; ?>
<?php
$sql = "SELECT * FROM php.blogs";
$result = $con->query($sql);
?>
<div class="container-fluid">
    <?php
    echo '<div class="cards">';
    if ($result->num_rows > 0) {
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $reversedRows = array_reverse($rows);
        foreach ($reversedRows as $row) {
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
        echo "No results found.";
    }
    echo '</div>';
    ?>
</div>
<?php include 'footer.php'; ?>