<?php
include('autenticacao.php');

// Verifica se o email foi fornecido
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // Conexão com o banco de dados
    $conexao = mysqli_connect('localhost', 'root', '', 'crypto_galaxy');

    // Proteção contra SQL Injection
    $email = mysqli_real_escape_string($conexao, $email);

    // Deleta a conta
    $sql = "DELETE FROM clientes WHERE email='$email'";
    if (mysqli_query($conexao, $sql)) {
        echo "Conta excluída com sucesso!";
    } else {
        echo "Erro ao excluir a conta.";
    }

    mysqli_close($conexao);
    header('location:login.html');
} else {
    echo "Nenhum email fornecido.";
}

?>