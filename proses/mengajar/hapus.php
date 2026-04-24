<?php
include '../../config/Database.php';
include '../../models/Mengajar.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$mengajar = new Mengajar($conn);

$id = $_GET['id'];

if ($mengajar->delete($id)) {
    setFlash("Data berhasil dihapus", "success");
} else {
    setFlash("Data gagal dihapus", "danger");
}

header("Location: " . BASE_URL . "views/mengajar/index.php");
exit;
?>