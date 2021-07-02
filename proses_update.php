<?php
require_once 'connect_db.php';

if (isset($_POST['submit'])) {
  $id = $_POST['id_produk'];
  $n_produk = $_POST['nama_produk'];
  $harga = $_POST['harga'];
  $qty = $_POST['qty'];
  
  $q = $conn->query("UPDATE produk SET nama_produk = '$n_produk', harga = '$harga', qty = '$qty' WHERE id_produk = '$id'");

  if ($q) {
    echo "<script>alert('Data produk berhasil diubah'); window.location.href='index.php'</script>";
  } else {
    echo "<script>alert('Data produk gagal diubah'); window.location.href='index.php'</script>";
  }
} else {
  header('Location: index.php');
}