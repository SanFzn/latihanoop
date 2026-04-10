<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Tambah Data</h2>

<form action="../../proses/tambah.php" method="POST">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Jurusan</label>
        <input type="text" name="jurusan" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

</body>
</html>