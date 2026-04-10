<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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
?>