<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mengajar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Tambah Data</h2>

<form action="../../proses/mengajar/tambah.php" method="POST">
    <div class="mb-3">
        <label>Guru</label>
        <input type="text" name="guru_id" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Mapel</label>
        <input type="text" name="mapel_id" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Kelas</label>
        <input type="text" name="kelas_id" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Jurusan</label>
        <input type="text" name="jurusan_id" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>