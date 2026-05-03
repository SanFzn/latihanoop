<?php
include_once __DIR__ . '/../../config/Helper.php';

// untuk menu aktif
$current = $_SERVER['REQUEST_URI'];
?>

<aside class="sidebar bg-white shadow-sm">
    <div class="sidebar-brand px-4 py-4 border-bottom">
        <a href="<?= BASE_URL ?>views/index.php" class="d-flex align-items-center text-decoration-none text-dark">
            <i class="bi bi-people-fill fs-4 me-2"></i>
            <span class="fs-5 fw-semibold">ICANACIN</span>
        </a>
    </div>

    <nav class="nav flex-column px-3 py-3">
        <a href="<?= BASE_URL ?>views/index.php" class="nav-link <?= strpos($current, 'views/index.php') !== false ? 'active' : '' ?>">
            <i class="bi bi-house-door me-2"></i> Beranda
        </a>

        <ul class="nav-section mt-3">
            <span class="text-uppercase small text-muted mb-2 d-block">Data</span>
            <a href="<?= BASE_URL ?>views/guru/index.php" class="nav-link <?= strpos($current, 'guru') !== false ? 'active' : '' ?>">
                <i class="bi bi-person-badge me-2"></i> Guru
            </a>
            <a href="<?= BASE_URL ?>views/murid/index.php" class="nav-link <?= strpos($current, 'murid') !== false ? 'active' : '' ?>">
                <i class="bi bi-people me-2"></i> Murid
            </a>
            <a href="<?= BASE_URL ?>views/kelas/index.php" class="nav-link <?= strpos($current, 'kelas') !== false ? 'active' : '' ?>">
                <i class="bi bi-door-closed me-2"></i> Kelas
            </a>
            <a href="<?= BASE_URL ?>views/jurusan/index.php" class="nav-link <?= strpos($current, 'jurusan') !== false ? 'active' : '' ?>">
                <i class="bi bi-bookmark me-2"></i> Jurusan
            </a>
            <a href="<?= BASE_URL ?>views/mapel/index.php" class="nav-link <?= strpos($current, 'mapel') !== false ? 'active' : '' ?>">
                <i class="bi bi-journal-text me-2"></i> Mapel
            </a>
        </ul>

        <a href="<?= BASE_URL ?>views/mengajar/index.php" class="nav-link <?= strpos($current, 'mengajar') !== false ? 'active' : '' ?>">
            <i class="bi bi-pencil-square me-2"></i> Mengajar
        </a>
    </nav>
</aside>