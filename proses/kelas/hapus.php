<?php
include '../../config/Database.php';
include '../../models/Kelas.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$kelas = new Kelas($conn);

$id = $_GET['id'];

if ($kelas->delete($id)) {
    setFlash("Data berhasil dihapus", "success");
} else {
    setFlash("Data gagal dihapus", "danger");
}

header("Location: ../../views/kelas/index.php");
exit;
?>