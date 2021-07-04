<?php

require_once 'connect_db.php';

// cek id
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // ambil data berdasarkan id_produk
  $q = $conn->query("SELECT * FROM produk WHERE id_produk = '$id'");
  foreach ($q as $dt) :
?>
  <!DOCTYPE html>
    <html>
    <head>
      <title>CRUD dengan PHP - Ubah</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" href="style.css">
    </head>
    <body>
      <div class="container">
        <div class="card">
          <div class="card-header">
            <h3>Ubah Data</h3>
          </div>
          <div class="card-body">
            <form method="post" action="proses_update.php">
              <input type="hidden" name="id_produk" value="<?= $dt['id_produk'] ?>">
              <div class="form-group col-md-8">
                <label>Nama produk</label>
                <input class="form-control" type="text" name="nama_produk" placeholder="Nama Produk" value="<?= $dt['nama_produk'] ?>">
              </div>
              <div class="form-group col-md-8">
                <label>Harga</label>
                <input class="form-control" type="number" name="harga" placeholder="Harga" value="<?= $dt['harga'] ?>">
              </div>
              <div class="form-group col-md-8">
                <label>Kuantitas</label>
                <input class="form-control" type="number" name="qty" placeholder="Qty" value="<?= $dt['qty'] ?>">
              </div>
              <div class="form-group col-md-8">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <footer>
        <div class="copyright">
          by <strong><span>Lutfiane Fadila Hasan</span></strong> (4519215001)
        </div>
      </footer>
    </body>
  </html>
  <?php
  endforeach;
}