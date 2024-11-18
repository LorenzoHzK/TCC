<?php
include('autenticacao.php');

$con = mysqli_connect('localhost', 'root', '', 'crypto_galaxy');
$sql = "select * from criptos order by nome asc";
$exe = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Criptos</title>
    <style>
        /* Estilo geral da página */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .produto-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
        }

        .produto-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            width: 250px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .produto-item:hover {
            transform: translateY(-5px);
        }

        .produto-item img {
            max-width: 50px;
            margin-bottom: 10px;
        }

        .produto-item a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s;
        }

        .produto-item a:hover {
            color: #0056b3;
        }

        .produto-info {
            font-size: 14px;
            color: #333;
        }
    </style>
</head>
<body>

<h1>Lista de Criptomoedas</h1>

<div class="produto-container">
    <?php
    while($res = mysqli_fetch_array($exe)){
        $id = $res['id'];
        $nome = $res['nome'];
        $valor = $res['valor'];
        $foto = $res['foto'];
        echo "<div class='produto-item'>
                <img src='Imagens/icon_moedas/$foto' alt='Imagem da Cripto'>
                <div class='produto-info'>
                    Produto: $nome <br> Preço: R$ $valor
                </div>
                <a href='del_cripto.php?id=$id'>Excluir</a>
                <a href='upd_cripto.php?id=$id'>Atualizar</a>
              </div>";
    }
    ?>
</div>

</body>
</html>

<?php
$fecha = mysqli_close($con);
?>