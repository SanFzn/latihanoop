<?php
include '../../config/Database.php';
include '../../models/Murid.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$murid = new Murid($conn);
$data = $murid->getAll();

$flash = getFlash();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Murid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Data Murid</h2>

<?php if($flash) : ?>
    <div class="alert alert-<?= $flash['tipe']; ?> alert-dismissible fade show" role="alert">
        <?= $flash['pesan']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<a href="tambah.php" class="btn btn-primary mb-3">Tambah</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; while($row = $data->fetch_assoc()) : ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['jurusan'] ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="../../proses/murid/hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>