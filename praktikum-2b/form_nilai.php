<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Nilai</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" style="padding: .75rem 1.25rem;">Sistem Penilaian</a>
    </div>
  </nav>

  <div class="container mt-4">
    <div class="card" style="border-style: none;">
      <div class="card-header bg-white">
        <h3 style="margin-left: 0;">Form Nilai Siswa</h3>
      </div>
      <div class="card-body col-12 text-end align-middle"></div>
      <form class="form-horizontal"
        method="POST" action="nilai_mahasiswa.php">
        <div class="form-group row">
          <label for="nama" class="col-4 col-form-label">Nama Lengkap</label>
          <div class="col-8">
            <input id="nama" name="nama" type="text" class="form-control" required="required">
          </div>
        </div>
        <div class="form-group row">
          <label for="matkul" class="col-4 col-form-label">Mata Kuliah</label>
          <div class="col-8">
            <select id="matkul" name="matkul" class="custom-select" required="required">
              <option value="DDP">Dasar Dasar Pemrograman</option>
              <option value="Basis Data">BD1</option>
              <option value="WEB1">Pemrograman Web</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="nilai_uts" class="col-4 col-form-label">Nilai UTS</label>
          <div class="col-8">
            <input id="nilai_uts" name="nilai_uts" type="number" class="form-control" required="required" min='0' max='100'>
          </div>
        </div>
        <div class="form-group row">
          <label for="nilai_uas" class="col-4 col-form-label">Nilai UAS</label>
          <div class="col-8">
            <input id="nilai_uas" name="nilai_uas" type="number" class="form-control" required="required" min='0' max='100'>
          </div>
        </div>
        <div class="form-group row">
          <label for="nilai_tugas" class="col-4 col-form-label">Nilai Tugas/Praktikum</label>
          <div class="col-8">
            <input id="nilai_tugas" name="nilai_tugas" type="number" class="form-control" required="required" min='0' max='100'>
          </div>
        </div>
        <div class="form-group row">
          <div class="offset-4 col-8">
            <button name="proses" type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          </div>
        </div>
      </form>
      </table>
    </div>
</body>

</html>