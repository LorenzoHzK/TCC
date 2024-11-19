<?php
include('autenticacao.php');
$id = $_GET['id'];
$conexao = mysqli_connect('localhost', 'root', '', 'crypto_galaxy');
$sql = "DELETE FROM carrinho WHERE id_car=$id";
$executar = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão do Produto</title>
    <style>
        /* Resetando margens e padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilizando o corpo da página */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Estilizando o pop-up */
        .popup {
            display: none; /* Inicialmente escondido */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
            z-index: 1001; /* Garantir que o pop-up fique acima de tudo */
        }

        /* Título do pop-up */
        .popup h1 {
            font-size: 2em;
            color: #e74c3c; /* Vermelho para indicar erro */
            margin-bottom: 20px;
        }

        /* Mensagem do pop-up */
        .popup p {
            font-size: 1.2em;
            margin-bottom: 30px;
            color: #e74c3c; /* Vermelho para erro */
        }

        /* Estilo para o botão de fechar */
        .popup .btn-close {
            font-size: 1em;
            color: #fff;
            background-color: #e74c3c;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        /* Efeito de hover no botão */
        .popup .btn-close:hover {
            background-color: #c0392b;
        }

        /* Estilo de fundo escurecido */
        .popup-overlay {
            display: none; /* Inicialmente escondido */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000; /* Fundo escurecido abaixo do pop-up */
        }

    </style>
</head>
<body>

    <!-- Fundo escurecido -->
    <div class="popup-overlay" id="popup-overlay"></div>

    <!-- Pop-up -->
    <div class="popup" id="popup">
        <?php
        if ($executar) {
            echo "<p>Produtos removidos do carrinho com sucesso!</p>";
        } else {
            echo "<p>Erro ao excluir o produto do carrinho.</p>";
        }
        ?>
        <button class="btn-close" onclick="closePopup()">Fechar</button>
    </div>

    <script>
        // Função para mostrar o pop-up
        window.onload = function () {
            document.getElementById('popup').style.display = 'block';
            document.getElementById('popup-overlay').style.display = 'block';
        };

        // Função para fechar o pop-up
        function closePopup() {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('popup-overlay').style.display = 'none';
            window.location.href = "carrinho.php";  // Redireciona para o carrinho após o fechamento
        }
    </script>
    
</body>
</html>

<?php
mysqli_close($conexao);
?>