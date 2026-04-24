<?php
session_start();
session_destroy();
echo "<script>
        alert('Logout Berhasil!');
        window.location.href='../views/login/login.php';
        </script>";
exit;
?>