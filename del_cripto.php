<?php
// Inicia a sessão (se não for necessário pode ser removido)
session_start();

// Verifica se o ID foi passado na URL
if (isset($_GET['id'])) {
    // Conecta ao banco de dados
    $con = mysqli_connect('localhost', 'root', '', 'crypto_galaxy');

    // Verifica se a conexão foi bem-sucedida
    if (!$con) {
        die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
    }

    // Obtém o ID da criptomoeda a ser excluída
    $id = $_GET['id'];

    // Consulta para verificar se a criptomoeda existe
    $sql_check = "SELECT * FROM criptos WHERE id = $id";
    $result = mysqli_query($con, $sql_check);

    if (mysqli_num_rows($result) > 0) {
        // Realiza a exclusão
        $sql_delete = "DELETE FROM criptos WHERE id = $id";
        if (mysqli_query($con, $sql_delete)) {
            // Caso a exclusão seja bem-sucedida, redireciona de volta para a página de lista
            header("Location: ver_cripto.php?msg=excluido");
        } else {
            echo "Erro ao excluir a criptomoeda: " . mysqli_error($con);
        }
    } else {
        echo "Criptomoeda não encontrada.";
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($con);
} else {
    echo "ID não especificado.";
}
?>