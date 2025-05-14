<?php
require_once __DIR__ . '/../models/KartuDiskon.php';

use models\KartuDiskon;


if (isset($_POST['submit'])) {
    $data = [
        'nama' => $_POST['nama'],
        'deskripsi' => $_POST['deskripsi'],
        'persen_diskon' => $_POST['persen_diskon'],
    ];

    KartuDiskon::create($data);
    header("Location: list-diskon.php");
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
                    <h1 class="mt-4">Tambah Kartu Diskon</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="list-diskon.php">Kartu Diskon</a></li>
                        <li class="breadcrumb-item active">Tambah Kartu Diskon</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tambah Kartu Diskon
                        </div>
                        <div class="card-body">
                            <form action="create-diskon.php" method="POST">
                                <div class="mb-3">
                                    <label for="kartu_diskon_id" class="form-label">Nama Kartu</label>
                                    <select class="form-control" id="kartu_diskon_id" name="nama" required>
                                        <option value=""> -- pilih kartu diskon -- </option>
                                        <option value="livin"> Livin' </option>
                                        <option value="wondr"> Wondr </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                                </div>
                                <div class="mb-3">
                                    <label for="persen_diskon" class="form-label">Persen Diskon</label>
                                    <input type="text" class="form-control" id="persen_diskon" name="persen_diskon" required>
                                </div>

                                <a href="list-diskon.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                                <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"></i>Simpan</button>
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