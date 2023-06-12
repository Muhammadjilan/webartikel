<html>
<head>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #FFFFFF;
        }
        .navbar-nav .nav-link {
            font-size: 16px;
            font-weight: 500;
            color: #FFFFFF;
        }
        .navbar-nav .nav-link:hover {
            color: #F9BE02;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark mt-0" style="background: linear-gradient(to right, #000000, #000000);">
        <a class="navbar-brand" href="#">Website Artikel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['username'])) {
                    if ($_SESSION['role'] === 'admin') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="tamu.php">Daftar Tamu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Create Post</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user.php">Artikel</a>
                        </li>
                    <?php }
                } ?>
                <?php if (isset($_SESSION['username'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</body>

</html>
