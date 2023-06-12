<?php
include "logic.php";
include "navbar.php";

// Ambil data warna dari halaman sebelumnya (misalnya menggunakan metode GET)
$color = isset($_GET['color']) ? $_GET['color'] : '#05445E'; // Warna default jika tidak ada data yang dikirim

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Website Artikel</title>
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        
        .container {
            margin-top: 10px;
        }
        
        .form-control {
            background-color: #05445E;
            color: #FFFFFF;
            border: none;
        }
        
        textarea {
            background-color: #05445E;
            color: #FFFFFF;
            border: none;
        }
    
        
        .btn {
            background-color: #F9BE02;
            border: none;
            color: #FFFFFF;
        }
        
        .btn:hover {
            background-color: #F67E02;
        }
        .bg-gradient-dark {
            background: linear-gradient(to bottom, #05445E, #032D3C);
        }

        .text-white {
            color: white;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <?php foreach ($query as $q) { ?>
        <form method="POST">
            <input type="text" hidden value='<?php echo $q['id'] ?>' name="id">
            <input type="text" placeholder="Judul Artikel"
                class="form-control my-3 bg-gradient-dark text-white text-center" name="title"
                value="<?php echo $q['title'] ?>">
            <textarea name="content" placeholder="Masukkan Abstrak" class="form-control my-3 bg-gradient-dark text-white"
                cols="30" rows="10"><?php echo $q['content'] ?></textarea>
            <input type="text" name="penulis" placeholder="nama Penulis"
                class="form-control my-3 bg-gradient-dark text-white text-center" name="penulis"
                value="<?php echo $q['penulis'] ?>">
            <input type="date" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
            <h6 class="mt-4">File Artikel</h6>
            <p class="mt-1 border-left border-dark pl-3"><a
                    href="read2.php?id=<?php echo $q['id']; ?>"><?php echo $q['file_artikel']; ?></a></p>
            <label class="my-3" for="file_artikel">File Artikel (PDF):</label>
            <input type="file" id="file_artikel" name="file_artikel" accept="application/pdf"><br>
            <button class="btn btn-dark" name="update">Update</button>
        </form>
        <?php } ?>
    </div>

   <!-- Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>
