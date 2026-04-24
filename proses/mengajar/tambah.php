<?php
include '../../config/Database.php';
include '../../models/Mengajar.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$mengajar = new Mengajar($conn);

$guru_id = $_POST['guru_id'];
$mapel_id = $_POST['mapel_id'];
$kelas_id = $_POST['kelas_id'];
$jurusan_id = $_POST['jurusan_id'];

if ($mengajar->create($guru_id, $mapel_id, $kelas_id, $jurusan_id)) {
    setFlash("Data berhasil ditambahkan", "success");
} else {
    setFlash("Data gagal ditambahkan", "danger");
}

header("Location: " . BASE_URL . "views/mengajar/index.php");
exit;
?>