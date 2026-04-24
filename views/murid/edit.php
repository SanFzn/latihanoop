<?php
include '../../config/Database.php';
include '../../models/Murid.php';

$db = new Database();
$conn = $db->connect();
$murid = new Murid($conn);

$id = $_GET['id'];
$data = $murid->getById($id);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Edit Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Edit Data</h2>

<form action="../../proses/murid/edit.php" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

</body>
</html>