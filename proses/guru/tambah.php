<?php
include '../../config/Database.php';
include '../../models/Guru.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$guru = new Guru ($conn);

$nama = $_POST['nama'];
$jeniskelamin = $_POST['jeniskelamin'];
$nip = $_POST['nip'];
$mapel = $_POST['mapel'];
$jabatan = $_POST['jabatan'];

if ($guru->create($nama, $jeniskelamin, $nip, $mapel, $jabatan)) {
    setFlash("Data berhasil ditambahkan", "success");
} else {
    setFlash("Data gagal ditambahkan", "danger");
}

header("Location: ../../views/guru/index.php");
exit;
?>