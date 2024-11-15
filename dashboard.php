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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Mercado de ações cripto</title>
</head>
<body>

    <h1 class="titulo-dashboard">Sua Dashboard</h1>
    <div class="painel">
        <div class="cartao">
            <img src="./Imagens/Dashboard - Imagens/icon-1.png" alt="">
            <i class="fas fa-wallet"></i>
            <h3>Total em Conta</h3>
            <p class="valor-grande">R$10,000</p>
        </div>

        <div class="cartao">
            <img src="./Imagens/Dashboard - Imagens/icon-2.png" alt="">
            <i class="fas fa-arrow-down"></i>
            <h3>Perdas nos Últimos 30 Dias</h3>
            <p class="destaque">-R$500</p>
        </div>

        <div class="cartao">
            <img src="./Imagens/Dashboard - Imagens/icon-3.png" alt="">
            <i class="fas fa-arrow-up"></i>
            <h3>Ganhos nos Últimos 30 Dias</h3>
            <p class="destaque">+R$1,000</p>
        </div>

        <div class="cartao">
            <img src="./Imagens/Dashboard - Imagens/icon-4.png" alt="">
            <i class="fas fa-money-bill-wave"></i>
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
                $sql_criptos = "SELECT nome, valor FROM criptos"; // Ajustado para não incluir 'quant'
                $result_criptos = mysqli_query($conexao, $sql_criptos);
                while ($cripto = mysqli_fetch_assoc($result_criptos)) {
                    echo '<tr>';
                    echo '<td>' . $cripto['nome'] . '</td>';
                    echo '<td>' . $cripto['valor'] . '</td>';
                    echo '<td><a href="#" class="buy-button">Comprar</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>