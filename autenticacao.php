<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // aqui ele vai redirecionar para a pag de login se tiver dado eerrado
    exit();
}

// Se estiver autenticado, ele vai seguir este caminho
include 'dashboard.html';
?>