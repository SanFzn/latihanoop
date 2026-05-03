<?php
include '../../config/Database.php';
include '../../models/Mapel.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$mapel = new Mapel($conn);

$id = $_GET['id'];

if ($mapel->delete($id)) {
    setFlash("Data berhasil dihapus", "success");
} else {
    setFlash("Data gagal dihapus", "danger");
}

header("Location: ../../views/mapel/index.php");
exit;
?>