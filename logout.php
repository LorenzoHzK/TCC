<?php
session_start();
$_SESSION['email'] = null;
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        /* Resetando margens e padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilo do corpo da página */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9; /* Cor neutra e suave */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Container centralizado para a mensagem */
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        /* Título da página */
        h1 {
            font-size: 2em;
            color: #333; /* Cor mais sóbria para o título */
            margin-bottom: 20px;
        }

        /* Mensagem de sucesso */
        p {
            font-size: 1.2em;
            color: #666; /* Cor mais suave para a mensagem */
            margin-bottom: 30px;
        }

        /* Estilo para o link */
        a {
            font-size: 1em;
            color: #007BFF; /* Azul simples para o link */
            text-decoration: none;
            padding: 12px 25px;
            border: 2px solid #007BFF;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Efeito de hover no link */
        a:hover {
            background-color: #007BFF;
            color: #fff;
        }

        /* Cor laranja no texto */
        .highlight {
            color: #e67e22; /* Laranja para destacar um texto */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Logout Realizado</h1>
        <p><span class="highlight">Logout realizado com sucesso!</span></p>
        <a href="login.html">Entrar novamente</a>
    </div>
</body>
</html>