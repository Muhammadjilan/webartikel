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

        .bg-gradient-dark {
            background: linear-gradient(to bottom, #05445E, #032D3C);
        }

        .text-white {
            color: white;
        }

        .btn-outline-dark {
            color: #05445E;
            border-color: #05445E;
        }

        .btn-outline-dark:hover {
            background-color: #05445E;
            color: white;
        }

        .border-left {
            border-left: 5px solid #032D3C;
        }

        .bi-calendar2-date {
            color: #032D3C;
        }
    </style>
</head>

<body>

   <div class="container mt-5">

   <?php foreach ($query as $q) { ?>
        <div class="bg-gradient-dark p-5 rounded-lg text-white text-center">
            <h1><?php echo $q['title']; ?></h1>

            <div class="d-flex mt-2 justify-content-center align-items-center">
                <!-- <a href="edit.php?id=<?php echo $q['id'] ?>" class="btn btn-light btn-sm ml-2" name="edit">Edit</a> -->
                <form method="POST">
                    <input type="text" hidden value='<?php echo $q['id'] ?>' name="id">
                    <!-- <button class="btn btn-danger btn-sm ml-2" name="delete"
                        style="margin-top: 18px; ">Delete</button> -->
                </form>
            </div>  

            </div>
            <h6 class="mt-5">Abstrak </h6>
            <p class="mt-1 border-left border-dark pl-3"><?php echo $q['content'];?></p>
            <h6 class="mt-4">Penulis </h6>
            <p class="mt-1 border-left border-dark pl-3"><?php echo $q['penulis'];?></p>
            <h6 class="mt-4">Tanggal</h6>
            <i class="mt-1 border-left border-dark pl-3 bi bi-calendar2-date"><?php echo $q['tanggal'];?></i>
            <h6 class="mt-4">File Artikel</h6>
            <p class="mt-1 border-left border-dark pl-3"><a href="read2.php?id=<?php echo $q['id']; ?>"><?php echo $q['file_artikel'];?></a></p>
            

        <?php } ?>    

        <a href="index.php" class="btn btn-outline-dark my-3">Go Home</a>
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