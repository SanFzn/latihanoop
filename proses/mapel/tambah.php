<?php
include '../../config/Database.php';
include '../../models/Mapel.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$mapel = new Mapel($conn);

$nama = $_POST['nama'] ?? null;

if ($mapel->create($nama)) {
    setFlash("Data berhasil ditambahkan", "success");
} else {
    setFlash("Data gagal ditambahkan", "danger");
}

header("Location: ../../views/mapel/index.php");
exit;
?>