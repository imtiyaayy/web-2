<?php
require_once __DIR__ . '/../models/DetailPesanan.php';
require_once __DIR__ . '/../models/Pesanan.php';
require_once __DIR__ . '/../models/Produk.php';

use models\DetailPesanan;
use models\Pesanan;
use models\Produk;

$pesananList = Pesanan::get();
$produkList = Produk::get();

if (isset($_POST['submit'])) {
    $data = [
        'pesanan_id' => $_POST['pesanan_id'],
        'produk_id' => $_POST['produk_id'],
        'jumlah' => $_POST['jumlah'],
        'harga_satuan' => $_POST['harga_satuan']
    ];


    DetailPesanan::create($data);
    header("Location: list-detail-pesanan.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create Detail Pesanan</title>
    <link href="../public/css/styles.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
    <?php include_once "navbar.php" ?>
    <div id="layoutSidenav">
        <?php include_once "sidebar.php" ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tambah Detail Pesanan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="list-detail-pesanan.php">Detail Pesanan</a></li>
                        <li class="breadcrumb-item active">Tambah Detail Pesanan</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">Form Tambah</div>
                        <div class="card-body">
                            <form action="create-detail-pesanan.php" method="POST">
                                <div class="mb-3">
                                    <label for="pesanan_id" class="form-label">Pesanan</label>
                                    <select name="pesanan_id" id="pesanan_id" class="form-control" required>
                                        <option value="">-- Pilih Pesanan --</option>
                                        <?php foreach ($pesananList as $pesanan) : ?>
                                            <option value="<?= $pesanan['id'] ?>"> <?= $pesanan['id'] ?> - <?= $pesanan['tanggal'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="produk_id" class="form-label">Produk</label>
                                    <select name="produk_id" id="produk_id" class="form-control" required>
                                        <option value="">-- Pilih Produk --</option>
                                        <?php foreach ($produkList as $produk) : ?>
                                            <option value="<?= $produk['id'] ?>"> <?= $produk['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah" id="jumlah" min="0" required>
                                </div>
                                <div class="mb-3">
                                    <label for="harga_satuan" class="form-label">Harga Satuan</label>
                                    <input type="number" class="form-control" name="harga_satuan" id="harga_satuan" min="0" required>
                                </div>

                                <a href="list-diskon.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                                <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <!-- footer start -->
            <?php include_once "footer.php" ?>
            <!-- footer end -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../public/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../public/js/datatables-simple-demo.js"></script>
</body>