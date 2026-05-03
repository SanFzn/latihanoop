<?php
// Start session (aman kalau dipanggil berkali-kali)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Panggil helper (untuk BASE_URL)
include_once __DIR__ . '/../../config/Helper.php';

// Ambil URI saat ini untuk active menu
$current = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Sekolah'; ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>views/layout/style.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm main-navbar">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= strpos($current, 'views/index.php') !== false ? 'active' : '' ?>" href="<?= BASE_URL ?>views/index.php">
                        <i class="bi bi-house-door me-2"></i>Beranda
                    </a>
                </li>
            </ul>

            <div class="d-flex align-items-center gap-3">
                <a class="btn btn-outline-light btn-sm" href="<?= BASE_URL ?>auth/logout.php">
                    <i class="bi bi-box-arrow-right me-1"></i> Logout (<?= $_SESSION['username'] ?? 'User'; ?>)
                </a>
            </div>
        </div>
    </div>
</nav>

<main class="container-fluid p-0">