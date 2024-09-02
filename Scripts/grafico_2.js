// Carrega o Google Charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Função para desenhar o gráfico
function drawChart() {
    // Faz a requisição para a API do CoinGecko
    fetch('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin,ethereum,ripple,cardano,solana,polkadot,dogecoin,binancecoin,shiba-inu,litecoin&vs_currencies=usd')
        .then(response => response.json())
        .then(data => {
            // Formata os dados para o Google Charts
            var dataTable = google.visualization.arrayToDataTable([
                ['Criptomoeda', 'Preço (USD)'],
                ['Bitcoin', data.bitcoin.usd],
                ['Ethereum', data.ethereum.usd],
                ['Ripple', data.ripple.usd],
                ['Cardano', data.cardano.usd],
                ['Solana', data.solana.usd],
                ['Polkadot', data.polkadot.usd],
                ['Dogecoin', data.dogecoin.usd],
                ['Binance Coin', data.binancecoin.usd],
                ['Shiba Inu', data['shiba-inu'].usd],
                ['Litecoin', data.litecoin.usd]
            ]);

            // Define as opções de estilo do gráfico
            var options = {
                title: 'Preços das Criptomoedas em USD',
                hAxis: {title: 'Criptomoeda'},
                vAxis: {title: 'Preço (USD)', minValue: 0},
                legend: 'none',
                colors: ['#4285F4'],
                bars: 'vertical'
            };

            // Desenha o gráfico
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(dataTable, options);
        })
        .catch(error => console.error('Erro ao obter dados:', error));
}

// Recarrega a página a cada 60 segundos
setTimeout(() => {
    location.reload();
}, 60000);