<?php
session_start();

// Fungsi untuk check apakah user sudah login
function checkLogin() {
    if (!isset($_SESSION['username'])) {
        header("Location: ../../auth/login.php");
        exit;
    }
}

// Fungsi untuk check role user (jika ada)
function checkRole($allowed_roles = []) {
    if (!isset($_SESSION['role'])) {
        header("Location: ../../auth/login.php");
        exit;
    }

    if (!in_array($_SESSION['role'], $allowed_roles)) {
        echo "<script>
                alert('Anda tidak memiliki akses ke halaman ini!');
                window.location.href='../index.php';
              </script>";
        exit;
    }
}

// Fungsi untuk get username dari session
function getUsername() {
    return isset($_SESSION['username']) ? $_SESSION['username'] : '';
}

// Fungsi untuk get user role dari session
function getUserRole() {
    return isset($_SESSION['role']) ? $_SESSION['role'] : '';
}

// Fungsi untuk get user id dari session
function getUserId() {
    return isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
}
?>