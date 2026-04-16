<?php
include '../../config/Database.php';
include '../../models/Guru.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();
$keyword = get('search');

$guru = new Guru($conn);

//Hitung total data
$totalData = $guru->countAll($keyword);

//Pagination
$pagination = paginate($totalData, 10);

//Ambil Data
$data = $guru->getData($pagination['start'], $pagination['limit'], $keyword);

//Ambil notifikasi
$flash = getFlash();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Data Guru</h2>

<?php if($flash) : ?>
    <div class="alert alert-<?= $flash['tipe']; ?> alert-dismissible fade show" role="alert">
        <?= $flash['pesan']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<a href="tambah.php" class="btn btn-primary mb-3">Tambah</a>

<form method="GET" class="mb-3 d-flex">
    <input type="text" name="search" class="form-control me-2" placeholder="Cari data..." value="<?= $keyword ?>">
    <button class="btn btn-primary">Cari</button>
    <a href="index.php" class="btn btn-secondary ms-2">Reset</a>
</form>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIP</th>
        <th>Mapel</th>
        <th>Jabatan</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; while($row = $data->fetch_assoc()) : ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['nip'] ?></td>
        <td><?= $row['mapel'] ?></td>
        <td><?= $row['jabatan'] ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="../../proses/guru/hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<nav>
<ul class="pagination">

<?php for($i = 1; $i <= $pagination['total_page']; $i++) : ?>
    <li class="page-item <?= $i == $pagination['current'] ? 'active' : '' ?>">
        <a class="page-link"
            href="?page=<?= $i ?>&search=<?= $keyword ?>">
        <?= $i ?>
        </a>
    </li>
<?php endfor; ?>

</ul>
</nav>

<a href="../index.php" class="btn btn-secondary">Kembali</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>