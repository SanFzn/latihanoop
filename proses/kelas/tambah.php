<?php
include '../../config/Database.php';
include '../../models/Kelas.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$kelas = new Kelas($conn);

$nama = $_POST['nama'] ?? null;

if ($kelas->create($nama)) {
    setFlash("Data berhasil ditambahkan", "success");
} else {
    setFlash("Data gagal ditambahkan", "danger");
}

header("Location: ../../views/kelas/index.php");
exit;
?>