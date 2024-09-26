<?php
include('autenticacao.php');
$id = $_POST['id'];
$nome = $_POST['nome'];
$quant = $_POST['quant'];
$valor = $_POST['valor'];
$conexao = mysqli_connect
('localhost','root','','crypto_galaxy');
$sql = "update criptos set nome='$nome', quant=$quant,
valor=$valor where id=$id";
$executar = mysqli_query($conexao, $sql);
if($executar){
    echo "Atualizado com sucesso!";
}
else{
    echo "Erro";
}
$fechar = mysqli_close($conexao);
?>