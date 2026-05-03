<?php
include '../../config/Database.php';
include '../../models/Murid.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$murid = new Murid ($conn);

$nama = $_POST['nama'];
$nisn = $_POST['nisn'];
$ttl = $_POST['ttl'];
$jenis_kelamin = $_POST['jenis_kelamin'];

if ($murid->create($nama, $nisn, $ttl, $jenis_kelamin)) {
    setFlash("Data berhasil ditambahkan", "success");
} else {
    setFlash("Data gagal ditambahkan", "danger");
}

header("Location: ../../views/murid/index.php");
exit;
?>