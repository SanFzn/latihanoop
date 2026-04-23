<?php
include '../../config/Database.php';
include '../../config/Helper.php';

$db = new Database();
$conn = $db->connect();

$username = $_POST['username'];
$password = $_POST['password'];

// cek user di database dengan prepared statement
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->bind_param('ss', $username, $password);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if ($data) {
    $_SESSION['username'] = $data['username'];
    echo "<script>
            alert('Login Berhasil!');
            window.location.href='../index.php';
            </script>";
} else {
    echo "<script>
            alert('Username atau Password salah!');
            window.location.href='../../../login.php';
            </script>";
}
?>