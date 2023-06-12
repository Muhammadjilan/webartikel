<!-- login_process.php -->

<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "portal_artikel");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Mendapatkan data dari form login.php
$username = $_POST['username'];
$password = $_POST['password'];

// Mengecek kecocokan username dan password dalam tabel "users"
$check_user = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $check_user);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $hash_password = $row['password'];

  // Memeriksa kecocokan password menggunakan fungsi password_verify()
  if (password_verify($password, $hash_password)) {
    // Jika password cocok, mulai sesi dan arahkan pengguna ke halaman yang sesuai berdasarkan peran (role) mereka
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $row['role'];

    if ($row['role'] === 'admin') {
      // Jika peran adalah admin, arahkan ke halaman admin.php
      header('Location: index.php');
      exit();
    } else {
      // Jika peran adalah user, arahkan ke halaman user.php
      header('Location: home.php');
      exit();
    }
  } else {
    // Jika password tidak cocok, tampilkan pesan error
    echo "Invalid username or password.";
  }
} else {
  // Jika username tidak ditemukan, tampilkan pesan error
  echo "Invalid username or password.";
}

// Menutup koneksi ke database
mysqli_close($conn);
?>
