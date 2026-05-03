<?php
session_start();

include '../config/Database.php';
include '../config/Helper.php';

if (!isset($_SESSION['username'])) {
    echo "<script>
        alert('Silahkan Login terlebih dahulu!');
        window.location.href='../auth/login/login.php';
    </script>";
    exit;
}
?>
<?php include 'layout/header.php'; ?>
<?php include 'layout/sidebar.php'; ?>

<div class="main-content">
    <div class="page-header p-4">
        <h1 class="h2 mb-3">Selamat Datang di Beranda</h1>
        <p class="text-muted mb-0">Halo, <?= $_SESSION['username']; ?>! Selamat datang kembali.</p>
    </div>
</div>

<?php include 'layout/footer.php'; ?>