<?php

require_once __DIR__ . '/../models/Pegawai.php';

use models\Pegawai;

if (!isset($_GET['id'])) {
    header("Location: list-pegawai.php");
    exit;
}

$pegawai = Pegawai::find($_GET['id']);

if (!$pegawai) {
    header("Location: list-pegawai.php");
    exit;
}

if (isset($_POST['submit'])) {
$data = [
'id' => $_GET['id'],
'nip' => $_POST['nip'],
'nama' => $_POST['nama'],
'jenis_kelamin' => $_POST['jenis_kelamin'],
'jabatan' => $_POST['jabatan'],
];

Pegawai::update($data);
header("Location: list-pegawai.php");
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
                    <h1 class="mt-4">Tambah Anggota</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="list-anggota.php">Anggota</a></li>
                        <li class="breadcrumb-item active">Tambah Anggota</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tambah Anggota
                        </div>
                        <div class="card-body">
                            <form action="edit-pegawai.php?id=<?= $pegawai['id'] ?>" method="POST">
                                <div class="mb-3">
                                    <label for="nip" class="form-label">NIP</label>
                                    <input type="text" class="form-control" id="nip" name="nip" value="<?= $pegawai['nip'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Pegawai</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $pegawai['nama'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label d-block">Jenis Kelamin</label>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="L" value="L" <?= strtoupper($pegawai['jenis_kelamin']) === 'L' ? 'checked' : '' ?>>
                                        <label for="L" class="form-check-label">L</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="P" value="P" <?= strtoupper($pegawai['jenis_kelamin']) === 'P' ? 'checked' : '' ?>>
                                        <label for="P" class="form-check-label">P</label>
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $pegawai['jabatan'] ?>" required>
                                </div>

                                <a href="list-pegawai.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
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