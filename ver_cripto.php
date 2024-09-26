<?php
include('autenticacao.php');

$con = mysqli_connect('localhost','root', '', 'crypto_galaxy');
$sql = "select * from criptos order by nome asc";
$exe = mysqli_query($con, $sql);

while($res = mysqli_fetch_array($exe)){
	$id = $res['id'];
	$nome = $res['nome'];
	$valor = $res['valor'];
	$foto = $res['foto'];
	echo "<div>
	<img width='50px' src='Imagens/icon_moedas/$foto'>
	Produto: $nome Preço: $valor
	<br><a href='del_cripto.php?id=$id'>Excluir</a>
	<br><a href='upd_cripto.php?id=$id'>atualizar</a>
	</div>";
}
$fecha = mysqli_close($con);
?>