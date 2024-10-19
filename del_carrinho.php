<?php
include('autenticacao.php');
$id = $_GET['id'];
$conexao = mysqli_connect
('localhost','root','','crypto_galaxy');
$sql = "DELETE FROM carrinho WHERE id_car=$id";
$executar = mysqli_query($conexao,$sql);
if($executar == 1){
    echo "Sucesso!";
}
else{
    echo "Erro!";
}
echo "<div><a href='carrinho.php'>Voltar ao carrinho</a></div>
     <div><a href='dashboard.php'>inicio</a></div>";
$fechar = mysqli_close($conexao);
?>