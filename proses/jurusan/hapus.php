<?php
include '../../config/Database.php';
include '../../models/Jurusan.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$jurusan = new Jurusan($conn);

$id = $_GET['id'];

if ($jurusan->delete($id)) {
    setFlash("Data berhasil dihapus", "success");
} else {
    setFlash("Data gagal dihapus", "danger");
}

header("Location: ../../views/jurusan/index.php");
exit;
?>