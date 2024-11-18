<?php
include 'autenticacao.php';
include 'header.html';

// Conexão com o banco de dados
$conexao = mysqli_connect('localhost', 'root', '', 'crypto_galaxy');

if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Recupera as criptomoedas
$sql = "SELECT nome, valor FROM criptos"; // Ajustado para não incluir 'quant'
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Estilos/dashboard.css">
    <link rel="shortcut icon" href="./Imagens/logo/favicon.ico" type="image/x-icon">
    <title>Mercado de ações cripto</title>
</head>
<body>

    <h1 class="titulo-dashboard">Sua Dashboard</h1>
    <div class="painel">
        <div class="cartao">
            <img src="./Imagens/Dashboard - Imagens/icon-1.png" alt="">
            <h3>Total em Conta</h3>
            <p class="valor-grande">R$10,000</p>
        </div>

        <div class="cartao">
            <img src="./Imagens/Dashboard - Imagens/icon-2.png" alt="">
            <h3>Perdas nos Últimos 30 Dias</h3>
            <p class="destaque">-R$500</p>
        </div>

        <div class="cartao">
            <img src="./Imagens/Dashboard - Imagens/icon-3.png" alt="">
            <h3>Ganhos nos Últimos 30 Dias</h3>
            <p class="destaque">+R$1,000</p>
        </div>

        <div class="cartao">
            <img src="./Imagens/Dashboard - Imagens/icon-4.png" alt="">
            <h3>Total Investido</h3>
            <p class="valor-grande">R$5,000</p>
        </div>
    </div>

    <div class="titulo_transacao">
        <h2>Histórico de Transações</h2>
    </div>
    <div class="historico-de-transacoes">
        <div class="titulos-das-transacoes">
            <div>Cripto</div>
            <div>Data</div>
            <div>Valor</div>
        </div>
        
        <?php
        while ($transacao = mysqli_fetch_assoc($resultado)) {
            echo '<div class="transacao">';
            echo '<div class="cripto">' . $transacao['nome'] . '</div>';
            echo '<div class="data">2024-11-14</div>';
            echo '<div class="valor">' . $transacao['valor'] . ' BTC</div>';
            echo '</div>';
        }
        ?>
    </div>

    <div class="titulo_mercado">
        <h2>Criptomoedas Disponíveis</h2>
    </div>
    <div class="div_criptos">
        <table id="crypto-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_criptos = "SELECT id, nome, valor FROM criptos";
                $result_criptos = mysqli_query($conexao, $sql_criptos);
                while ($cripto = mysqli_fetch_assoc($result_criptos)) {
                    echo '<tr>';
                    echo '<td>' . $cripto['nome'] . '</td>';
                    echo '<td>' . $cripto['valor'] . '</td>';
                    echo '<td><a href="add_carrinho.php?id=' . $cripto['id'] . '" class="buy-button">Comprar</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>