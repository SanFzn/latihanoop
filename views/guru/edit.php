<?php
include '../../config/Database.php';
include '../../models/Guru.php';

$db = new Database();
$conn = $db->connect();

$guru = new Guru($conn);

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
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
    </div>

    <div class="mb-3">
        <label>NIP</label>
        <input type="text" name="nip" class="form-control" value="<?= $data['nip'] ?>" required>
    </div>

    <div class="mb-3">
        <label>Mapel</label>
        <input type="text" name="mapel" class="form-control" value="<?= $data['mapel'] ?>" required>
    </div>

    <div class="mb-3">
        <label>Jabatan</label>
        <input type="text" name="jabatan" class="form-control" value="<?= $data['jabatan'] ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

</body>
</html>