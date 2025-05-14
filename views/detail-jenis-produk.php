<?php
require_once __DIR__ . '/../models/JenisProduk.php';

use models\JenisProduk;


if (!isset($_GET['id'])) {
    header("Location: list-jenis-produk.php");
    exit;
}

$jenis_produk = JenisProduk::find($_GET['id']);

var_dump($jenis_produk);

if(!$jenis_produk) {
    header("Location: list-jenis-pegawai.php");
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
                    <h1 class="mt-4">Detail Jenis Produk</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="list-jenis-produk.php">Data Jenis Produk</a></li>
                        <li class="breadcrumb-item"><a href="list-jenis-produk.php">Jenis Produk</a></li>
                        <li class="breadcrumb-item active">Detail Jenis Produk</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tambah Jenis Produk
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>nama</th>
                                    <td><?= $jenis_produk['nama'] ?></td>
                                </tr>
                                <tr>
                                    <th>deskripsi</th>
                                    <td><?= $jenis_produk['deskripsi'] ?></td>
                                </tr>
                            </table>

                            <div class="mb-3">
                                <a href="list-jenis-produk.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                                <a href="edit-jenis-produk.php?id=<?= $jenis_produk['id'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                <a href="delete-jenis-produk.php?id=<?= $jenis_produk['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </div>
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