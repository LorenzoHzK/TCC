<?php
include("autenticacao.php");
$nome = $_POST['nome'];
$quant = $_POST['quant'];
$valor = $_POST['valor'];
$uploaddir = 'C:\xampp\htdocs\TCC\Imagens\icon_moedas/';
$nomeArq = basename($_FILES['arquivo']['name']);
$uploadfile = $uploaddir.$nomeArq;

$conexao = mysqli_connect ('localhost','root','','crypto_galaxy');

$sql = "insert into criptos (nome, quant, valor, foto) values ('$nome', $quant, $valor, '$nomeArq')";
echo $sql;
$executar = mysqli_query($conexao, $sql);

if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
	if($executar){
		echo "cadastrado";
	}
	else{
		echo "erro ao cadastrar";
	}
} else {
    echo "Erro ao enviar arquivo!";
}
$fechar = mysqli_close($conexao);
?>