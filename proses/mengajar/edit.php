<?php
include '../../config/Database.php';
include '../../models/Mengajar.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$mengajar = new Mengajar($conn);

$id = $_POST['id'];
$guru_id = $_POST['guru_id'];
$mapel_id = $_POST['mapel_id'];
$kelas_id = $_POST['kelas_id'];
$jurusan_id = $_POST['jurusan_id'];

//VALIDASI SEDERHANA
if (empty($guru_id) || empty($mapel_id) || empty($kelas_id) || empty($jurusan_id)) {
    setFlash("Data Tidak Lengkap", "danger");
    header("Location: " . BASE_URL . "views/mengajar/index.php");
    exit;
}

if ($mengajar->update($id, $guru_id, $mapel_id, $kelas_id, $jurusan_id)) {
    setFlash("Data berhasil diupdate", "success");
} else {
    setFlash("Data gagal diupdate", "danger");
}

header("Location: " . BASE_URL . "views/mengajar/index.php");
exit;
?>