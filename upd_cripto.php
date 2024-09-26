<?php
include('autenticacao.php');
$id = $_GET['id'];
$conexao = mysqli_connect('localhost','root','','crypto_galaxy');
$sql = "SELECT * FROM criptos WHERE id=$id";
$executar = mysqli_query($conexao, $sql);
$res = mysqli_fetch_array($executar);
$fechar = mysqli_close($conexao);
?>
    <form action="atualizar.php" method="post">
        Id da moeda <input type="text" name="id"
        value="<?php echo $res['id'];?>" readonly><br>
        Nome do produto <input type="text" name="nome"
        value="<?php echo $res['nome'];?>"><br>
        Quantidade <input type="text" name="quant"
        value="<?php echo $res['quant'];?>"><br>
        Valor <input type="text" name="valor"
        value="<?php echo $res['valor'];?>"><br>
        <input type="submit">
    </form>
	<?php
?>