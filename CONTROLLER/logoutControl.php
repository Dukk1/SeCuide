<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('Voce saiu!'); window.location.href = '../index.php';</script>";
if (isset($_SESSION['idPerfil'])) { //admin/admin_header-54, exclusivo*
    unset($_SESSION['idPerfil']);
}

if (isset($_SESSION['idUsuario'])) { //admin/admin_header-54, exclusivo*
    unset($_SESSION['idUsuario']);
}
?>