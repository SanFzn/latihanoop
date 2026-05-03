<?php
include '../../config/Database.php';
include '../../models/Kelas.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$kelas = new Kelas($conn);

$id = $_POST['id'];
$nama = $_POST['nama'];

if ($kelas->update($id, $nama)) {
    setFlash("Data berhasil diupdate", "success");
} else {
    setFlash("Data gagal diupdate", "danger");
}

header("Location: ../../views/kelas/index.php");
exit;
?>