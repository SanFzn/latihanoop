<?php
include '../../config/Database.php';
include '../../models/Mengajar.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$guru_id = mysqli_query($conn, "SELECT * FROM guru ORDER BY id DESC");
$mapel_id = mysqli_query($conn, "SELECT * FROM mapel ORDER BY id ");
$kelas_id = mysqli_query($conn, "SELECT * FROM kelas ORDER BY id");
$jurusan_id = mysqli_query($conn, "SELECT * FROM jurusan ORDER BY id ");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mengajar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Tambah Data Mengajar</h2>

<form action="../../proses/mengajar/tambah.php" method="POST">

    <div class="mb-3">
        <label>Guru</label>
        <select name="guru_id" class="form-control" required>
            <option value="">Pilih Guru</option>
            <?php while ($g = mysqli_fetch_assoc($guru_id)) : ?>
                <option value="<?= $g['id'] ?>">
                    <?= htmlspecialchars($g['nama']) ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>
    
    <div class="mb-3">
        <label>Mapel</label>
        <select name="mapel_id" class="form-control" required>
            <option value="">Pilih Mapel</option>
            <?php while ($mp = mysqli_fetch_assoc($mapel_id)) : ?>
                <option value="<?= $mp['id'] ?>">
                    <?= htmlspecialchars($mp['nama']) ?>
                </option>
                <?php endwhile; ?>
        </select>
    </div>

        <div class="mb-3">
            <label>Kelas</label>
            <select name="kelas_id" class="form-control" required>
                <option value="">Pilih Kelas</option>
                <?php while ($k = mysqli_fetch_assoc($kelas_id)) : ?>
                    <option value="<?= $k['id'] ?>">
                        <?= htmlspecialchars($k['nama']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

    <div class="mb-3">
        <label>Jurusan</label>
        <select name="jurusan_id" class="form-control" required>
            <option value="">Pilih Jurusan</option>
            <?php while ($j = mysqli_fetch_assoc($jurusan_id)) : ?>
                <option value="<?= $j['id'] ?>">
                    <?= htmlspecialchars($j['nama']) ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>