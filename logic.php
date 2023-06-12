<?php


    // Initialize a database connection
    $conn = mysqli_connect("localhost", "root", "", "portal_artikel");

    // Destroy if not possible to create a connection
    if(!$conn){
        echo "<h3 class='container bg-dark p-3 text-center text-warning rounded-lg mt-5'>Not able to establish Database Connection<h3>";
    }

    // Get data to display on index page
    $sql = "SELECT * FROM blog_data";
    $query = mysqli_query($conn, $sql);

    // Create a new post
    if(isset($_POST['new_post'])){
        $title = $_POST['title'];
        $content = $_POST['content'];
        $penulis = $_POST['penulis'];
        $tanggal = $_POST['tanggal'];

        $file_artikel = $_FILES['file_artikel']['name'];
        $tempname = $_FILES['file_artikel']['tmp_name'];
        $folder = "../webartikel/uploads/" . $file_artikel;
        move_uploaded_file($tempname, $folder);
        // Simpan data ke database
        $sql = "INSERT INTO blog_data (title, content, penulis, tanggal, file_artikel) VALUES ('$title', '$content', '$penulis', '$tanggal', '$folder')";
        if (mysqli_query($conn, $sql)) {
            echo "Post baru berhasil ditambahkan";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        header("Location: index.php?info=added");
        exit();
    }

    // Get post data based on id
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM blog_data WHERE id = $id";
        $query = mysqli_query($conn, $sql);
        $post = mysqli_fetch_assoc($query);

        // Check if file exists
        if(!empty($post['file_artikel'])){
            $file_artikel = $post['file_artikel'];
            $lokasi_file = $file_artikel;

            // Generate iframe to display PDF
            $pdf_viewer = '<iframe src="https://docs.google.com/viewer?url=' . urlencode($lokasi_file) . '&embedded=true" style="width:1%; height:0px;" frameborder="0"></iframe>';
                echo $pdf_viewer;
        } else {
           echo "";
        }
        
    }

    // Delete a post
    if(isset($_REQUEST['delete'])){
        $id = $_REQUEST['id'];

        $sql = "DELETE FROM blog_data WHERE id = $id";
        mysqli_query($conn, $sql);

        header("Location: index.php");
        exit();
    }

    
    if(isset($_POST['update'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $penulis = $_POST['penulis'];
    $tanggal = $_POST['tanggal'];

    // Cek apakah ada file yang diupload
    if($_FILES['file_artikel']['error'] === UPLOAD_ERR_OK){
        $file_artikel = $_FILES['file_artikel']['name'];
        $tempname = $_FILES['file_artikel']['tmp_name'];
        $folder = "../webartikel/uploads/" . $file_artikel;
        move_uploaded_file($tempname, $folder);

        // Simpan data ke database
        $sql = "UPDATE blog_data SET title = '$title', content = '$content', penulis = '$penulis', tanggal = '$tanggal', file_artikel = '$folder' WHERE id = $id";
    } else {
        // Simpan data ke database tanpa mengupdate file
        $sql = "UPDATE blog_data SET title = '$title', content = '$content', penulis = '$penulis', tanggal = '$tanggal' WHERE id = $id";
    }
    if (mysqli_query($conn, $sql)) {
        echo "Post baru berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    header("Location: index.php?info=added");
    exit();
}

session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit;
}
// Jika form disubmit
if(isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $sql = "INSERT INTO tamu (nama, email) VALUES ('$nama', '$email')";

    if (mysqli_query($conn, $sql)) {
        header("Location: user.php?info=added");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}


        
    
    

?>