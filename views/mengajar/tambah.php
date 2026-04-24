<?php
include '../../config/Database.php';
include '../../models/Mapel.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();
$mapelModel = new Mapel($conn);
$mapels = $mapelModel->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Tambah Data</h2>

<form action="../../proses/guru/tambah.php" method="POST">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Jenis Kelamin</label>
        <select name="jeniskelamin" class="form-control" required>
            <option value="">Pilih Jenis Kelamin</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>

    <div class="mb-3">
        <label>NIP</label>
        <input type="text" name="nip" class="form-control" pattern="[0-9]+" inputmode="numeric" maxlength="18" title="Hanya angka" required>
    </div>

    <div class="mb-3">
        <label>Mapel</label>
        <select name="id_mapel" class="form-control" required>
            <option value="">Pilih Mapel</option>
            <?php while ($mapel = $mapels->fetch_assoc()) : ?>
                <option value="<?= $mapel['id'] ?>"><?= htmlspecialchars($mapel['nama']) ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Jabatan</label>
        <input type="text" name="jabatan" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>