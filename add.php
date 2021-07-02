<?php

require_once 'connect_db.php';

if (isset($_POST['submit'])) {
  $n_produk = $_POST['nama_produk'];
  $harga    = $_POST['harga'];
  $qty      = $_POST['qty'];
  $q = $conn->query("INSERT INTO produk (nama_produk, harga, qty) VALUES ('$n_produk', '$harga', '$qty')");

  if ($q) {
    echo "<script>alert('Data produk berhasil ditambahkan'); window.location.href='index.php'</script>";
  } else {
    echo "<script>alert('Data produk gagal ditambahkan'); window.location.href='index.php'</script>";
  }
} else {
  header('Location: index.php');
}