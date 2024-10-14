<?php
include('autenticacao.php');

$conexao = mysqli_connect('localhost', 'root', '', 'crypto_galaxy');

// Coleta as informações do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$foto = null;

// Verifica se a foto foi enviada e processa o upload
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
    $diretorio = 'Imagens/icon_moedas/';
    $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $novo_nome = uniqid() . '.' . $extensao;
    move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio . $novo_nome);
    $foto = $novo_nome; // Nome da nova foto
}

// Monta a query de atualização
$sql = "UPDATE clientes SET nome='$nome', senha='$senha'" . ($foto ? ", foto='$foto'" : "") . " WHERE email='$email'";
$executar = mysqli_query($conexao, $sql);

echo $executar ? "Atualizado com sucesso!" : "Erro: " . mysqli_error($conexao);

mysqli_close($conexao);
?>
