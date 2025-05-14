<?php

require_once __DIR__ . '/../models/Anggota.php';
require_once __DIR__ . '/../models/KartuDiskon.php';

use models\Anggota;
use models\KartuDiskon;

if (!isset($_GET['id'])) {
    header("Location: list-anggota.php");
    exit;
}

$anggota = Anggota::find($_GET['id']);
$daftarKartuDiskon = KartuDiskon::GET();

if (!$anggota) {
    header("Location: list-anggota.php");
    exit;
}

if (isset($_POST['submit'])) {
    $data = [
        'id' => $_GET['id'],
        'pegawai' => $_POST['pegawai_id'] ?? '',
        'status_aktif' => $_POST['status_aktif'] ?? '',
        'kartu_diskon_id' => $_POST['kartu_diskon'] ?? '',
    ];

    Anggota::update($data);
    header("Location: list-anggota.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Update Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../public/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include_once "navbar.php"; ?>
    <div id="layoutSidenav">
        <?php include_once "sidebar.php"; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Update Anggota</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="list-anggota.php">Anggota</a></li>
                        <li class="breadcrumb-item active">Update Anggota</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-user-edit me-1"></i>
                            Form Edit Anggota
                        </div>
                        <div class="card-body">
                            <form action="edit-anggota.php?id=<?= $anggota['id'] ?>" method="POST">
                                <div class="mb-3">
                                    <label class="form-label d-block">Status Aktif</label>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="status_aktif" id="aktif" value="1" <?= $anggota['status_aktif'] == '1' ? 'checked' : '' ?>>
                                        <label for="aktif" class="form-check-label">Aktif</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="status_aktif" id="non_aktif" value="0" <?= $anggota['status_aktif'] == '0' ? 'checked' : '' ?>>
                                        <label for="non_aktif" class="form-check-label">Tidak Aktif</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="kartu_diskon" class="form-label">Kartu Diskon</label>
                                    <select class="form-control" id="kartu_diskon" name="kartu_diskon_id" required>
                                        <option value=""> </option>
                                        <?php foreach ($daftarKartuDiskon as $diskon): ?>
                                            <option value="<?= $diskon['id'] ?>"><?= $diskon['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <a href="list-anggota.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                                <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <?php include_once "footer.php"; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../public/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../public/js/datatables-simple-demo.js"></script>
</body>

</html>