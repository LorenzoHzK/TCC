<?php
include('autenticacao.php');
$id = $_GET['id'];
$conexao = mysqli_connect
('localhost','root','','crypto_galaxy');
$sql = "select foto from criptos where id=$id";
$exe = mysqli_query($conexao,$sql);
$res = mysqli_fetch_array($exe);
$foto = $res['foto'];
$sql = "DELETE FROM criptos WHERE id=$id";
$executar = mysqli_query($conexao,$sql);
if($executar == 1){
	//echo $foto;
	unlink("CImagens\icon_moedas");
    header('location:ver_cripto.php');
}
else{
    echo "Erro!";
}
$fechar = mysqli_close($conexao);
?>
