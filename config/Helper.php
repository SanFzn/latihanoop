<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// FLASH MESSAGE (Notifikasi Pesan)
function setFlash($pesan, $tipe = 'success') {
    $_SESSION['flash'] = [
        'pesan' => $pesan,
        'tipe' => $tipe
    ];
}

function getFlash() {
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}

//GET PARAMETER AMAN (Searching)
function get($key) {
    return isset($_GET[$key]) ? htmlspecialchars($_GET[$key]) : null;
}

//PAGINATION
function paginate($totalData, $limit = 10) {
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $limit;
    $totalPage = ceil($totalData / $limit);

    return [
        'start' => $start,
        'limit' => $limit,
        'current' => $page,
        'total_page' => $totalPage
    ];
}

define('BASE_URL', 'http://localhost/latihanoop/');


?>