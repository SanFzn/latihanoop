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
        <label>Jurusan</label>
        <select name="jurusan" class="form-control" required>
            <option value="">Pilih Jurusan</option>
            <option value="Kuliner">Kuliner</option>
            <option value="Perhotelan">Perhotelan</option>
            <option value="MPLB">MPLB</option>
            <option value="PPLG">PPLG</option>
            <option value="Busana">Busana</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>