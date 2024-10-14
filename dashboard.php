<?php
include 'autenticacao.php';
include 'header.html';

// Conexão com o banco de dados
$conexao = mysqli_connect('localhost', 'root', '', 'crypto_galaxy');

if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Recupera as criptomoedas
$sql = "SELECT nome, valor, quant FROM criptos"; // Ajustado para usar valor e quant
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
            <p class="destaque">+R$1,200</p>
        </div>

        <div class="cartao">
            <img src="./Imagens/Dashboard - Imagens/icon-4.png" alt="">
            <i class="fas fa-coins"></i>
            <h3>Criptomoeda Mais Possuída</h3>
            <p class="valor-grande">Bitcoin (BTC)</p>
        </div>
    </div>

    <h1 class="titulo_transacao" id="transacao"> Suas Transações </h1>
    <div class="transacoes_grafico">
        <div class="historico-de-transacoes">
            <h2>Últimas Transações</h2>
            <div class="titulos-das-transacoes">
                <span class="titulo-data">Data</span>
                <span class="titulo-cripto">Moeda</span>
                <span class="titulo-valor">Valor</span>
            </div>
            <div class="transacao">
                <span class="data">25/08/2024</span>
                <span class="cripto">Bitcoin (BTC)</span>
                <span class="valor">$2,500.00</span>
            </div>
            <div class="transacao">
                <span class="data">24/08/2024</span>
                <span class="cripto">Ethereum (ETH)</span>
                <span class="valor">$1,800.00</span>
            </div>
            <div class="transacao">
                <span class="data">23/08/2024</span>
                <span class="cripto">Ripple (XRP)</span>
                <span class="valor">$500.00</span>
            </div>
            <div class="transacao">
                <span class="data">22/08/2024</span>
                <span class="cripto">Litecoin (LTC)</span>
                <span class="valor">$300.00</span>
            </div>
        </div>
        <div id="curve_chart" style="width: 900px; height: 500px;"></div>
        <script src="./Scripts/grafico.js"></script>
    </div>

    <h2 class="titulo_mercado" id="mercado_acoes">Mercado de Cripto moedas</h2>
    <div class="div_criptos">
        <div>
            <table border="1" id="crypto-table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Valor Atual (USD)</th>
                        <th>Quantidade</th>
                        <th>Ação</th> <!-- Nova coluna para ação -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Verifica se há resultados e preenche a tabela
                    if ($resultado && mysqli_num_rows($resultado) > 0) {
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>
                                    <td>{$row['nome']}</td>
                                    <td>{$row['valor']}</td>
                                    <td>{$row['quant']}</td>
                                    <td>
                                        <form action='comprar.php' method='POST'>
                                            <input type='hidden' name='nome' value='{$row['nome']}'>
                                            <input type='hidden' name='valor' value='{$row['valor']}'>
                                            <input type='hidden' name='quant' value='{$row['quant']}'>
                                            <button type='submit'>Comprar</button>
                                        </form>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Nenhuma criptomoeda encontrada.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="chart_div" style="width: 1000px; height: 600px;"></div>
        <script src="./Scripts/grafico_2.js"></script>
    </div>

</body>
</html>

<?php
// Fecha a conexão
mysqli_close($conexao);
?>