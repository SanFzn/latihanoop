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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #005effff;
            --secondary-color: #005effff;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand, .nav-link {
            color: white !important;
            font-weight: 500;
        }
        
        .nav-link:hover {
            color: rgba(255, 255, 255, 0.8) !important;
        }

        .main-container {
            margin-top: 30px;
        }
    </style>

</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="../../views/index.php">
                <i class="bi bi-people-fill me-2"></i>Beranda
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../../views/index.php">
                            <i class="bi bi-house-door me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../views/guru/index.php">
                            <i class="bi bi-person-lines-fill me-1"></i>Data Guru
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../views/murid/index.php">
                            <i class="bi bi-person-square me-1"></i>Data Murid
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../auth/logout.php">
                            <i class="bi bi-box-arrow-right me-1"></i>Logout (<?= htmlspecialchars($_SESSION['username']); ?>)
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container main-container">
        <h2>Data Guru</h2>

        <?php if($flash) : ?>
            <div class="alert alert-<?= $flash['tipe']; ?> alert-dismissible fade show" role="alert">
                <?= $flash['pesan']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <a href="tambah.php" class="btn btn-primary mb-3">Tambah</a>

        <form method="GET" class="mb-3 d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari data..." value="<?= htmlspecialchars($keyword) ?>">
            <button class="btn btn-primary">Cari</button>
            <a href="index.php" class="btn btn-secondary ms-2">Reset</a>
        </form>

        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>

            <?php $no = 1; if ($data->num_rows > 0) : ?>
                <?php while($row = $data->fetch_assoc()) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="../../proses/guru/hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center">Data tidak ditemukan.</td>
                </tr>
            <?php endif; ?>
        </table>

        <nav>
        <ul class="pagination">

        <?php for($i = 1; $i <= $pagination['total_page']; $i++) : ?>
            <li class="page-item <?= $i == $pagination['current'] ? 'active' : '' ?>">
                <a class="page-link"
                    href="?page=<?= $i ?>&search=<?= urlencode($keyword) ?>">
                <?= $i ?>
                </a>
            </li>
        <?php endfor; ?>

        </ul>
        </nav>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>