<?php
require_once __DIR__ . '/../models/JenisProduk.php';

use models\JenisProduk;

$jenis_produk = JenisProduk::get();
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
                    <h1 class="mt-4">Data Jenis Produk</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="list-jenis-produk.php">Data Jenis Produk</a></li>
                        <li class="breadcrumb-item active">Data Jenis Produki</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Jenis Produk
                        </div>
                        <div class="card-body">
                            <div class="mb-3 text-end">
                                <a href="create-jenis-produk.php" class="btn btn-success">
                                    <i class="fa-solid fa-plus">Tambah Jenis Produk</i>
                                </a>
                            </div>
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($jenis_produk as $index => $jenis_produk) : ?>
                                        <tr>
                                            <td><?= $index + 1; ?></td>
                                            <td><?= $jenis_produk['nama'] ?></td>
                                            <td><?= $jenis_produk['deskripsi'] ?></td>
                                            <td>
                                                <a href="detail-jenis-produk.php?id=<?= $jenis_produk['id'] ?>" class="btn btn-primary">
                                                    <i class="fas fa-eye"></i> Detail
                                                </a>
                                                <a href="edit-jenis-produk.php?id=<?= $jenis_produk['id'] ?>" class="btn btn-warning">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="delete-jenis-produk.php?id=<?= $jenis_produk['id'] ?>" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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