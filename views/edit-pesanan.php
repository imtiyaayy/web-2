<?php

require_once __DIR__ . '/../models/Pesanan.php';
require_once __DIR__ . '/../models/Anggota.php';

use models\Pesanan;
use models\Anggota;

$anggotaList = Anggota::get();

if (!isset($_GET['id'])) {
    header("Location: list-pesanan.php");
    exit;
}

$pesanan = Pesanan::find($_GET['id']);

if (!$pesanan) {
    header("Location: list-pesanan.php");
    exit;
}

if (isset($_POST['submit'])) {
    $data = [
        'id' => $_GET['id'],
        'tanggal' => $_POST['tanggal'],
        'diskon' => $_POST['diskon'],
        'status_bayar' => $_POST['status_bayar'],
        'anggota_id' => $_POST['anggota_id'],
    ];

    Pesanan::update($data);
    header("Location: list-pesanan.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Project 01</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../public/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <!-- navbar start -->
    <?php include_once "navbar.php" ?>
    <!-- navbar end -->
    <div id="layoutSidenav">
        <!-- sidebar start -->
        <?php include_once "sidebar.php" ?>
        <!-- sidebar end -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Pesanan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="list-pesanan.php">Data Pesanan</a></li>
                        <li class="breadcrumb-item"><a href="list-anggota.php">Pesanan</a></li>
                        <li class="breadcrumb-item active">Edit Pesanan</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Edit Pesanan
                        </div>
                        <div class="card-body">
                            <form action="edit-pesanan.php?id=<?= $pesanan['id'] ?>" method="POST">
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $pesanan['tanggal'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="diskon" class="form-label">Diskon</label>
                                    <input type="text" class="form-control" id="diskon" name="diskon" value="<?= $pesanan['diskon'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label d-block">Status Bayar</label>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="status_bayar" id="belum_bayar" value="belum_bayar" <?= $pesanan['status_bayar'] == 'belum_bayar' ? 'checked' : '' ?>>
                                        <label for="belum_bayar" class="form-check-label">Belum Bayar</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="status_bayar" id="sudah_bayar" value="sudah_bayar" <?= $pesanan['status_bayar'] == 'sudah_bayar' ? 'checked' : '' ?>>
                                        <label for="sudah_bayar" class="form-check-label">Sudah Bayar</label>
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <label for="anggota_id" class="form-label">ID Anggota</label>
                                    <input type="text" class="form-control" id="anggota_id" name="anggota_id" value="<?= $pesanan['anggota_id'] ?>" required>
                                </div>

                                <a href="list-pesanan.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                                <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
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

</html>