<?php
include '../../config/Database.php';
include '../../models/Murid.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$murid = new Murid($conn);

$id = $_GET['id'];

if ($murid->delete($id)) {
    setFlash("Data berhasil dihapus.", "success");
} else {
    setFlash("Data gagal dihapus.", "danger");
}

header("Location: ../../views/murid/index.php");
exit();
?>