<?php
include 'autenticacao.php';
include 'header.html';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Estilos/carteira.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="./Imagens/logo/favicon.ico" type="image/x-icon">
    <title>Carteira - Crypto Galaxy</title>
</head>
<body>
    <main>
        <h1 class="titulo">Sua Carteira</h1>

        <div class="carteira-info">
            <div class="saldo">
                <h2>Saldo Total</h2>
                <p class="valor">R$ 15,000.00</p>
            </div>
            <div class="saldo-disponivel">
                <h2>Saldo Disponível</h2>
                <p class="valor">R$ 13,500.00</p>
            </div>
            <div class="lucros">
                <h2>Lucros Totais</h2>
                <p class="valor">R$ 1,800.00</p>
            </div>
        </div>

        <div class="transacoes">
            <h2>Suas Criptomoedas</h2>
            <table>
                <thead>
                    <tr>
                        <th>Criptomoeda</th>
                        <th>Quantidade</th>
                        <th>Valor Atual (R$)</th>
                        <th>Total em R$</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Bitcoin (BTC)</td>
                        <td>0.5</td>
                        <td>R$ 120,000.00</td>
                        <td>R$ 60,000.00</td>
                    </tr>
                    <tr>
                        <td>Ethereum (ETH)</td>
                        <td>3</td>
                        <td>R$ 20,000.00</td>
                        <td>R$ 60,000.00</td>
                    </tr>
                    <tr>
                        <td>Ripple (XRP)</td>
                        <td>200</td>
                        <td>R$ 5.00</td>
                        <td>R$ 1,000.00</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="acoes">
            <button class="btn">Adicionar Fundos</button>
            <button class="btn btn-secondary">Retirar Fundos</button>
        </div>

        <div class="historico-transacoes">
            <h2>Histórico de Transações</h2>
            <table>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Tipo</th>
                        <th>Quantidade</th>
                        <th>Valor (R$)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01/09/2024</td>
                        <td>Compra</td>
                        <td>0.1 BTC</td>
                        <td>R$ 12,000.00</td>
                    </tr>
                    <tr>
                        <td>28/08/2024</td>
                        <td>Venda</td>
                        <td>0.5 ETH</td>
                        <td>R$ 10,000.00</td>
                    </tr>
                    <tr>
                        <td>20/08/2024</td>
                        <td>Depósito</td>
                        <td>R$ 5,000.00</td>
                        <td>R$ 5,000.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>