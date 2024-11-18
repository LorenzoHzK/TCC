<?php
include('autenticacao.php');
$email = $_SESSION['email'];
$conexao = mysqli_connect('localhost', 'root', '', 'crypto_galaxy');
$sql = "SELECT * FROM carrinho, criptos WHERE carrinho.email = '$email' AND carrinho.id_crypto = criptos.id";
$exe = mysqli_query($conexao, $sql);    
$total = 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <!-- Estilos CSS -->
    <style>
        /* Estilo geral do carrinho */
        div {
            margin-bottom: 10px;
            font-family: Arial, sans-serif;
        }

        /* Container geral do carrinho */
        .carrinho-container {
            max-width: 400px;
            margin: 20px auto;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Estilo dos produtos */
        .carrinho-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .carrinho-item:last-child {
            border-bottom: none;
        }

        /* Estilo do total */
        .carrinho-total {
            font-weight: bold;
            font-size: 18px;
            text-align: center;
            margin-top: 15px;
        }

        /* Links */
        .carrinho-links a {
            display: inline-block;
            margin: 10px 5px;
            padding: 8px 15px;
            border: 1px solid #007bff;
            border-radius: 4px;
            color: #007bff;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .carrinho-links a:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="carrinho-container">
    <?php
    while ($res = mysqli_fetch_array($exe)) {
        $id_car = $res['id_car'];
        $nome = $res['nome'];
        $valor = $res['valor'];
        $total += $valor;
        
        echo "<div class='carrinho-item'>
                <span>Produto: $nome</span>
                <span>Preço: R$ $valor</span>
              </div>";
    }
    ?>

    <div class="carrinho-total"><b>Total:</b> R$ <?php echo $total; ?></div>

    <div class="carrinho-links">
        <a href="del_carrinho.php?id=<?php echo $id_car; ?>">Remover todos os itens</a>
        <a href="dashboard.php">Comprar mais</a>
    </div>
</div>

</body>
</html>

<?php
$fecha = mysqli_close($conexao);
?>