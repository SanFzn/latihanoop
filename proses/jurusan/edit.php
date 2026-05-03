<?php
include '../../config/Database.php';
include '../../models/Jurusan.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$jurusan = new Jurusan($conn);

$id = $_POST['id'];
$nama = $_POST['nama'];

if ($jurusan->update($id, $nama)) {
    setFlash("Data berhasil diupdate", "success");
} else {
    setFlash("Data gagal diupdate", "danger");
}

header("Location: ../../views/jurusan/index.php");
exit;
?>