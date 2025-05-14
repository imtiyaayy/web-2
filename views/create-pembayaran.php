<?php
require_once __DIR__ . '/../models/Pembayaran.php';
require_once __DIR__ . '/../models/Pesanan.php';

use models\Pembayaran;
use models\Pesanan;

$pesananList = Pesanan::get();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'jumlah_bayar' => $_POST['jumlah_bayar'],
        'tanggal' => $_POST['tanggal'],
        'pesanan_id' => $_POST['pesanan_id']
    ];

    $success = Pembayaran::create($data);

    if ($success) {
        header('Location: list-transaksi.php');
        exit;
    } else {
        $error = "Gagal menyimpan data pembayaran.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Pembayaran</title>
    <link href="../public/css/styles.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
    <?php include_once "navbar.php" ?>
    <div id="layoutSidenav">
        <?php include_once "sidebar.php" ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tambah Pembayaran</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="list-transaksi.php">Pembayaran</a></li>
                        <li class="breadcrumb-item active">Tambah Pembayaran</li>
                    </ol>
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label>
                                    <input type="number" class="form-control" id="jumlah_bayar" name="jumlah_bayar" min="0" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>
                                <div class="mb-3">
                                    <label for="pesanan_id" class="form-label">Pesanan</label>
                                    <select class="form-select" name="pesanan_id" id="pesanan_id" required>
                                        <option value="">-- Pilih Pesanan --</option>
                                        <?php foreach ($pesananList as $pesanan) : ?>
                                            <option value="<?= $pesanan['id'] ?>">#<?= $pesanan['id'] ?> - <?= $pesanan['tanggal'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <a href="list-pembayaran.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                                <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"></i>Simpan</button>

                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <?php include_once "footer.php" ?>
        </div>
    </div>
</body>

</html>