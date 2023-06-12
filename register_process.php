<!-- register_process.php -->

<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "portal_artikel");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Mendapatkan data dari form register.php
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// Melakukan validasi data (misalnya: username harus unik)
$check_username = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $check_username);

if (mysqli_num_rows($result) > 0) {
  // Jika username sudah digunakan, tampilkan pesan error
  echo "Username already exists. Please choose a different username.";
} else {
  // Jika username belum digunakan, simpan data user baru ke dalam tabel "users"
  $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Mengenkripsi password menggunakan bcrypt

  $insert_user = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', '$role')";

  if (mysqli_query($conn, $insert_user)) {
    // Jika berhasil disimpan, alihkan pengguna ke halaman login
    header("Location: login.php");
    exit();
  } else {
    echo "Error: " . $insert_user . "<br>" . mysqli_error($conn);
  }
}

// Menutup koneksi ke database
mysqli_close($conn);
?>
