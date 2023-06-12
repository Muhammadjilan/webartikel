<?php

include "logic.php";
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Website Artikel</title>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .mt-5 {
            margin-top: 5%;
        }

        .card {
            background: linear-gradient(to bottom, #05445E, #032D3C);
            color: white;
        }

        .card-title {
            color: white;
        }

        .card-text {
            color: white;
        }

        .btn-light {
            color: #05445E;
            background-color: white;
            border-color: white;
        }

        .btn-light:hover {
            color: #05445E;
            background-color: #d3d3d3;
            border-color: #d3d3d3;
        }

        .text-danger {
            color: red;
        }
       
    </style>
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center my-4">Welcome To Our Website Article</h1>

        <!-- Display any info -->
        <?php if (isset($_REQUEST['info'])) { ?>
        <?php if ($_REQUEST['info'] == "added") { ?>
        <div class="alert alert-success" role="alert">
            Post has been added successfully
        </div>
        <?php } ?>
        <?php } ?>

        <!-- Create a new Post button -->
        <div class="text-center ">
            <a href="create.php" class="btn btn-outline-dark">+ Create a new post</a>
        </div>

        <!-- Display posts from database -->
        <div class="row">
            <?php foreach ($query as $q) { ?>
            <div class="col-12 col-lg-4 d-flex justify-content-center">
                <div class="card text-white bg-dark mt-5" style="width: 18rem;">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $q['title']; ?></h4>
                        <h6 class="card-text">Abstrak :</h6>
                        <p class="card-text"><?php echo substr($q['content'], 0, 100); ?>...</p>
                        <h6 class="card-text">Penulis :</h6>
                        <p class="card-text"><?php echo substr($q['penulis'], 0, 100); ?>...</p>
                        <h6 class="card-text">Tanggal :</h6>
                        <p class="card-text"><?php echo substr($q['tanggal'], 0, 100); ?>...</p>
                        <a href="view.php?id=<?php echo $q['id'] ?>" class="btn btn-light">Read More <span
                                class="text-danger">&rarr;</span></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>

</body>

</html>
