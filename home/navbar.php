<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Blogs</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link 
                    <?php
                    $currentURL = $_SERVER['REQUEST_URI'];
                    if (!str_contains($currentURL, 'profile.php') && !str_contains($currentURL, 'create.php')) {
                        echo 'active';
                    }
                    ?>
                    " aria-current="page" href="index.php">Home</a>
                </li>
                <?php
                if (isset($_SESSION['user'])) {
                    echo '<li class="nav-item"><a class="nav-link ';
                    if (str_contains($currentURL, 'profile.php')) {
                        echo 'active';
                    }
                    echo '
                    " href="profile.php">Profile</a></li>
                    <li class="nav-item mb-2" id="mob-logout-btn">
                        <a href="create.php" class="btn btn-primary text-center">
                            Create Blog
                        </a>
                    </li>
                    <li class="nav-item" id="mob-logout-btn">
                        <form action="../registration/registration.php" method="get">
                            <input class="btn btn-danger" type="submit" value="Logout" name="logout" />
                        </form>
                    </li>
                    ';
                } else {
                    echo '
                    <li class="nav-item" id="mob-login-btn">
                        <a class="nav-link" href="../registration/login.php"><button class="btn btn-primary">Login</button></a>
                    </li>';
                }
                ?>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <?php
            if (isset($_SESSION['user'])) {
                echo '
                    <div class="nav-item" id="pc-logout-btn">
                        <a href="create.php" class="btn btn-primary text-center">
                            Create Blog
                        </a>
                    </div>
                    <div class="nav-item" id="pc-logout-btn">
                        <form action="../registration/registration.php" method="get">
                            <input class="btn btn-danger" type="submit" value="Logout" name="logout" />
                        </form>
                    </div>';
            } else {
                echo '
                    <div class="nav-item" 
                    id="pc-login-btn">
                        <a class="nav-link" href="../registration/login.php"><button class="btn btn-primary">Login</button></a>
                    </div>';
            }
            ?>
        </div>
    </div>
</nav>