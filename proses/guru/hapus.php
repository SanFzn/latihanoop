<?php
include '../../config/Database.php';
include '../../models/Guru.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$guru = new Guru($conn);

$id = $_GET['id'];

if ($guru->delete($id)) {
    setFlash("Data berhasil dihapus", "success");
} else {
    setFlash("Data gagal dihapus", "danger");
}

header("Location: ../../views/guru/index.php");
exit;
?>