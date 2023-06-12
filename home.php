<?php 
include "logic.php";
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        background-color: #05445E;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        color: #FFFFFF;
        font-size: 16px;
    }

    h3 {
        text-align: center;
        margin-bottom: 20px;
        color: #F9BE02;
        font-size: 32px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    label {
        color: #f8f9fa;
    }

    .form-control {
        height: 40px;
        border-radius: 3px;
        background: linear-gradient(to right, #05445E, #01293A);
        border: none;
        padding-left: 10px;
        color: #FFFFFF;
        font-size: 16px;
    }

    .btn {
        background: linear-gradient(to right, #F9BE02, #F67E02);
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background: linear-gradient(to right, #F67E02, #E54900);
    }

    table {
        color: #FFFFFF;
    }

    th {
        background-color: #F9BE02;
        color: #05445E;
    }

    /* Ubah warna pada navbar, td, dan th menjadi putih */
    
    table td,
    table th {
        color: #01293A;
        background: #f8f9fa;
    }

</style>
<body>
    <div class="container mt-5">
        <h3 class="text-center my-4">Buku Tamu</h3>

        <!-- Display any info -->
        <?php if(isset($_REQUEST['info'])){ ?>
            <?php if($_REQUEST['info'] == "added"){?>
                <div class="alert alert-success" role="alert">
                    Data tamu berhasil ditambahkan!
                </div>
            <?php }?>
        <?php } ?>

        <!-- Form input data tamu -->
        <form action="" method="POST">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" name="submit" class="btn btn-dark">Submit</button>
        </form>

        <!-- Display data tamu -->
        <div class="mt-5">
            <?php 
                $sql = "SELECT * FROM tamu";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<h5>Data Tamu</h5>";
                    echo "<table class='table'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th scope='col'>#</th>";
                    echo "<th scope='col'>Nama</th>";
                    echo "<th scope='col'>Email</th>";
                    echo "<th scope='col'>Waktu</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result)){
						echo "<tr>";
						echo "<th scope='row'>".$no."</th>";
						echo "<td>".$row['nama']."</td>";
						echo "<td>".$row['email']."</td>";
						echo "<td>".$row['waktu']."</td>";
						echo "</tr>";
						$no++;
						}
						echo "</tbody>";
						echo "</table>";
						} else {
						echo "<p class='mt-4'>Belum ada data tamu yang ditambahkan.</p>";
						}
						mysqli_close($conn);
						?>
					</div>
				
				</div>
				
				<!-- Bootstrap JS -->
				<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
				<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmIaXjGkjoQ6TJwvcOQ" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
				</body>
</html>				