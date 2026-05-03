<?php
include '../../config/Database.php';
include '../../models/Jurusan.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$jurusan = new jurusan($conn);

$nama = $_POST['nama'] ?? null;

if ($jurusan->create($nama)) {
    setFlash("Data berhasil ditambahkan", "success");
} else {
    setFlash("Data gagal ditambahkan", "danger");
}

header("Location: ../../views/jurusan/index.php");
exit;
?>