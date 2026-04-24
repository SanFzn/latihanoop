<?php
include '../../config/Database.php';
include '../../models/Murid.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$murid = new Murid ($conn);

$nama = $_POST['nama'];

if ($murid->create($nama)) {
    setFlash("Data berhasil ditambahkan", "success");
} else {
    setFlash("Data gagal ditambahkan", "danger");
}

header("Location: ../../views/murid/index.php");
exit;
?>