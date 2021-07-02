<?php
require_once 'connect_db.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Latihan CRUD</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <h5 class="date">Tanggal: <?= date("d/m/Y H:i a") ?></h5>
        <form method="post" action="add.php">
          <div class="row">
            <div class="form-group col-md-5">
              <input class="form-control" type="text" name="nama_produk" placeholder="Nama Produk">
            </div>
            <div class="form-group col-md-3">
              <input class="form-control" type="number" name="harga" placeholder="Harga">
            </div>
            <div class="form-group col-md-2">
              <input class="form-control" type="number" name="qty" placeholder="Qty">
            </div>
            <div class="form-group col-md-2">
              <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
            </div>
          </div>
        </form>
        <table class="table">
          <tr>
            <th width="10%">No.</th>
            <th width="40%">Nama Produk</th>
            <th width="30%">Harga</th>
            <th width="10%">Qty</th>
            <th width="10%" colspan="2">Aksi</th>
          </tr>
          <?php
          $q           = $conn->query("SELECT * FROM produk");
          $no          = 1;
          $total_harga = 0;
          $total_qty   = 0;
          while ($dt = $q->fetch_assoc()) :
            $total_harga = $total_harga + intval($dt['harga']) * intval($dt['qty']);
            $total_qty   = $total_qty + intval($dt['qty']);
          ?>
          <tr>  
            <td><?= $no++ ?></td>
            <td><?= $dt['nama_produk'] ?></td>
            <td><?= 'Rp '.number_format($dt['harga'], 2) ?></td>
            <td><?= $dt['qty'] ?></td>
            <td><a href="update.php?id=<?= $dt['id_produk'] ?>">Ubah</a></td>
            <td><a href="delete.php?id=<?= $dt['id_produk'] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a></td>
          </tr>
          <?php
          endwhile;
          ?> 
          <tr>  
            <td colspan="2"><b>Total<b></td>
            <td><b><?='Rp '.number_format($total_harga, 2) ?><b></td>
            <td><b><?=$total_qty ?><b></td>
            <td></td>
            <td></td>
          </tr>
        </table>
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