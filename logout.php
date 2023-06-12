<?php
  // menghentikan session
  session_start();
  session_unset();
  session_destroy();
  
  // menghapus cookie
  setcookie('username', '', time()-3600, '/');
  
  // kembali ke log in
  header('Location: login.php');
  exit;
?>
