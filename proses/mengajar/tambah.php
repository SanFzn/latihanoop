<?php
include '../../config/Database.php';
include '../../models/Mengajar.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$mengajar = new Mengajar($conn);

$g = $_POST['guru_id'];
$mp = $_POST['mapel_id'];
$k = $_POST['kelas_id'];
$j = $_POST['jurusan_id'];

if ($mengajar->create($g, $mp, $k, $j)) {
    setFlash("Data berhasil ditambahkan", "success");
} else {
    setFlash("Data gagal ditambahkan", "danger");
}

header("Location: ../../views/mengajar/index.php");
exit;
?>