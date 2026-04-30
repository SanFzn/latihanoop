<?php
include '../../config/Database.php';
include '../../models/Mengajar.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$mengajar = new Mengajar($conn);

$id = $_POST['id'];
$g = $_POST['guru_id'];
$mp = $_POST['mapel_id'];
$k = $_POST['kelas_id'];
$j = $_POST['jurusan_id'];

if ($mengajar->update($id, $g, $mp, $k, $j)) {
    setFlash("Data berhasil diupdate", "success");
} else {
    setFlash("Data gagal diupdate", "danger");
}

header("Location: ../../views/mengajar/index.php");
exit;
?>