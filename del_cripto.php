<?php
include('autenticacao.php');
$email = $_SESSION['email'];
$conexao = mysqli_connect('localhost', 'root', '', 'crypto_galaxy');

// Verifica se o parâmetro 'remove_all' foi passado
if (isset($_GET['remove_all']) && $_GET['remove_all'] == 'true') {
    $sql = "DELETE FROM carrinho WHERE email = '$email'";
    $executar = mysqli_query($conexao, $sql);
    
    if ($executar) {
        echo "Todos os itens foram removidos do carrinho!";
    } else {
        echo "Ocorreu um erro ao tentar remover os itens!";
    }
} else {
    // Caso o ID de um item específico seja passado, removê-lo
    $id = $_GET['id'];
    $sql = "DELETE FROM carrinho WHERE id_car = $id";
    $executar = mysqli_query($conexao, $sql);
    
    if ($executar) {
        echo "Item removido com sucesso!";
    } else {
        echo "Erro ao remover item!";
    }
}

header('Location: carrinho.php'); // Redireciona para o carrinho após a operação
?>