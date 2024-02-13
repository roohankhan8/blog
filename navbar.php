<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Blogs</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <?php
                if (isset($_SESSION['email'])) {
                    echo '
                    <li id="mob-logout-btn" class="nav-item">
                        <form action="registration.php" method="get">
                            <input class="btn btn-danger" type="submit" value="Logout" name="logout" />
                        </form>
                    </li>';
                } else{
                    echo '
                    <li id="mob-login-btn" class="nav-item">
                        <a class="nav-link" href="login.php"><button class="btn btn-primary">Login</button></a>
                    </li>';
                }
                ?>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a id="pc-login-btn" class="nav-link" href="login.php"><button class="btn btn-primary">Login</button></a>
        </div>
    </div>
</nav>