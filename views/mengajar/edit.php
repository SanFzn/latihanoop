<?php
include '../../config/Database.php';
include '../../models/Guru.php';
include '../../models/Mapel.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();
$guru = new Guru($conn);
$mapelModel = new Mapel($conn);
$mapels = $mapelModel->getAll();

$id = $_GET['id'];
$data = $guru->getById($id);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Edit Data</h2>

<form action="../../proses/guru/edit.php" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required>
    </div>

    <div class="mb-3">
        <label>Jenis Kelamin</label>
        <select name="jeniskelamin" class="form-control" required>
            <option value="L" <?= $data['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
            <option value="P" <?= $data['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
        </select>
    </div>

    <div class="mb-3">
        <label>NIP</label>
        <input type="text" name="nip" class="form-control" value="<?= htmlspecialchars($data['nip']) ?>" pattern="[0-9]+" inputmode="numeric" maxlength="18" title="Hanya angka" required>
    </div>

    <div class="mb-3">
        <label>Mapel</label>
        <select name="id_mapel" class="form-control" required>
            <option value="">Pilih Mapel</option>
            <?php while ($mapel = $mapels->fetch_assoc()) : ?>
                <option value="<?= $mapel['id'] ?>" <?= $mapel['id'] == $data['id_mapel'] ? 'selected' : '' ?>><?= htmlspecialchars($mapel['nama']) ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Jabatan</label>
        <input type="text" name="jabatan" class="form-control" value="<?= htmlspecialchars($data['jabatan']) ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

</body>
</html>