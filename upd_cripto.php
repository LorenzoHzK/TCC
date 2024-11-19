<?php
include('autenticacao.php');
$id = $_GET['id'];
$conexao = mysqli_connect('localhost', 'root', '', 'crypto_galaxy');
$sql = "SELECT * FROM criptos WHERE id=$id";
$executar = mysqli_query($conexao, $sql);
$res = mysqli_fetch_array($executar);
$fechar = mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Criptomoeda</title>
    <style>
        /* Geral */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container do Formulário */
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        /* Inputs e Labels */
        form input[type="text"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Botão de Enviar */
        form input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            text-transform: uppercase;
        }

        form input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <form action="atualizar.php" method="post">
        <label for="id">Id da moeda</label>
        <input type="text" name="id" id="id" value="<?php echo $res['id']; ?>" readonly>

        <label for="nome">Nome do produto</label>
        <input type="text" name="nome" id="nome" value="<?php echo $res['nome']; ?>">

        <label for="quant">Quantidade</label>
        <input type="text" name="quant" id="quant" value="<?php echo $res['quant']; ?>">

        <label for="valor">Valor</label>
        <input type="text" name="valor" id="valor" value="<?php echo $res['valor']; ?>">

        <input type="submit" value="Atualizar">
    </form>
</body>
</html>