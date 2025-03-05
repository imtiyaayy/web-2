<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Belanja</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <div class="container mt-5">
    <div class="col-4" style="float: right;">
      <div class="card">
        <div class="card-header bg-primary text-white">Daftar Harga</div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item bg-light">TV : Rp.4.200.000</li>
          <li class="list-group-item bg-light">Kulkas : Rp.3.100.000</li>
          <li class="list-group-item bg-light">Mesin Cuci : Rp.3.800.000</li>
        </ul>
      </div>
      <div class="card-footer bg-primary text-white">Harga Dapat Berubah Setiap Saat</div>
    </div>

    <div class="col-8">
      <div class="header">
        <header class="border-bottom">
          <h3>Belanja Online</h3>
        </header>
      </div>
      <div class="col-10 align-middle">
        <form method="POST" action="form_belanja.php" class="container mt-5">
          <div class="form-group row">
            <label for="nama" class="col-4 col-form-label">Customer</label>
            <div class="col-8">
              <input id="nama" name="nama" type="text" class="form-control" required="required">
            </div>
          </div>
          <div class="form-group row">
            <label for="produk" class="col-4 text-end">Pilih Produk</label>
            <div class="col-8">
              <div class="custom-control custom-radio custom-control-inline">
                <input name="produk" id="produk_1" type="radio" class="custom-control-input" value="Televisi" required="required">
                <label for="produk_1" class="custom-control-label">Tv</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input name="produk" id="produk_2" type="radio" class="custom-control-input" value="Kulkas" required="required">
                <label for="produk_2" class="custom-control-label">Kulkas</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input name="produk" id="produk_3" type="radio" class="custom-control-input" value="Mesin Cuci" required="required">
                <label for="produk_3" class="custom-control-label">Mesin Cuci</label>
              </div>
            </div>
          </div>

          <div class="form-group row text-end mt-3">
            <label for="jumlah" class="col-4 col-form-label">Jumlah</label>
            <div class="col-4">
              <input id="jumlah" name="jumlah" type="number" class="form-control" required min='0'>
            </div>
          </div>
          <div class="form-group row">
            <div class="offset-4 col-8">
              <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
        <?php
        if (isset($_POST['submit'])) {
          $nama = $_POST['nama'];
          $produk = $_POST['produk'];
          $jumlah = $_POST['jumlah'];
          $harga = 0;
          if ($produk == 'Televisi') {
            $harga = 4200000 * $jumlah;
          } elseif ($produk == 'Kulkas') {
            $harga = 3100000 * $jumlah;
          } elseif ($produk == 'Mesin Cuci') {
            $harga = 3800000 * $jumlah;
          } else {
            $harga = 0;
          }
          echo "Nama Customer : $nama";
          echo '<br/>Produk Pilihan : ' . $produk;
          echo '<br/>Jumlah Beli : ' . $jumlah;
          echo '<br/>Total Belanja : Rp. ' . number_format($harga, 0, ',', '.');
        } ?>
</body>

</html>