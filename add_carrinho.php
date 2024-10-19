<?php
include('autenticacao.php');
$id_crypto = $_GET['id'];
$email = $_SESSION['email'];
$con = mysqli_connect('localhost','root', '', 'crypto_galaxy');
$sql = "insert into carrinho (email, id_crypto) values ('$email', $id_crypto)";
$exe = mysqli_query($con, $sql);
if($exe){
	echo"Produto inserido no carrinho";
}
else{
	echo"erro";
}
echo "<a href='dashboard.php'>Comprar mais</a>";
$fecha = mysqli_close($con);
?>