<?php
include '../../config/Database.php';
include '../../models/Mapel.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$mapel = new Mapel($conn);

$id = $_POST['id'];
$nama = $_POST['nama'];

if ($mapel->update($id, $nama)) {
    setFlash("Data berhasil diupdate", "success");
} else {
    setFlash("Data gagal diupdate", "danger");
}

header("Location: ../../views/mapel/index.php");
exit;
?>