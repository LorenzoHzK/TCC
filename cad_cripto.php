<?php 
include("autenticacao.php");
include("header.html")
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" type="text/css" href="Estilos/cad_cripto.css">
</head>
<body>
<?php
$con = mysqli_connect('localhost', 'root', '', 'crypto_galaxy');
$sql = "select * from criptos order by nome asc";
$exe = mysqli_query($con, $sql);
?>
    <form action="inserir.php" method="post" enctype="multipart/form-data" >
		Escolher arquivo: <input name="arquivo" type="file"><br>
        Nome do produto <input type="text" name="nome"><br>
        Quantidade <input type="text" name="quant"><br>
        Valor <input type="text" name="valor"><br>
		<?php
		while($res = mysqli_fetch_array($exe)){
			$id = $res['id'];
			$nome = $res['nome'];
		}   
		?>
		</select><br>
        <input type="submit">
    </form>

<?php
?>
</body>
</html>
