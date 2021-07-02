<?php
require_once 'connect_db.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $q  = $conn->query("DELETE FROM produk WHERE id_produk = '$id'");

  if ($q) {
    echo "<script>alert('Data berhasil dihapus'); window.location.href='index.php'</script>";
  } else {
    echo "<script>alert('Data berhasil dihapus'); window.location.href='index.php'</script>";
  }
} else {
  header('Location:index.php');
}