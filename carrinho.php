<?php
include('autenticacao.php');
$email = $_SESSION['email'];
$con = mysqli_connect('localhost','root', '', 'crypto_galaxy');
$sql = "select * from carrinho, criptos where carrinho.email = '$email' and carrinho.id_crypto=criptos.id";
$exe = mysqli_query($con, $sql);    
$total = 0;
while($res = mysqli_fetch_array($exe)){
	$id_car = $res['id_car'];
	$nome = $res['nome'];
	$valor = $res['valor'];
	$total += $valor;
	echo "<div>Produto: $nome Preço: $valor <a href='del_carrinho.php?id=$id_car'>Remover</a></div>";
}
echo"<div>O valor total é:<b> $total</b></div>";
echo "<div><a href='ver_cripto.php'>Comprar mais</a></div>";
$fecha = mysqli_close($con);
?>	