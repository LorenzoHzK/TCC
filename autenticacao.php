<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html"); // aqui ele vai redirecionar para a pag de login se tiver dado eerrado
    exit();
    echo("Faça login para continuar");
}

?>