<!DOCTYPE html>
<html>
<head>
    <title>Tambah Murid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Tambah Data</h2>

<form action="../../proses/murid/tambah.php" method="POST">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>NISN</label>
        <input type="number" name="nisn" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Tempat, Tanggal Lahir</label>
        <input type="text" name="ttl" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-select" required>
            <option value="" disabled selected>Pilih jenis kelamin</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>