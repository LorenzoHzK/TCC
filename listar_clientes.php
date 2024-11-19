<?php
    // Conectar ao banco de dados
    $conexao = mysqli_connect('localhost', 'root', '', 'crypto_galaxy');

    // Verificar a conexão
    if (!$conexao) {
        die("Erro na conexão: " . mysqli_connect_error());
    }

    // Consultar os dados dos clientes
    $instrucao = "SELECT id_cli, nome, email, senha, foto FROM clientes";  // Ajuste conforme sua tabela e colunas
    $resultado = mysqli_query($conexao, $instrucao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Clientes</title>
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
            background-color: #f4f4f4; /* Cor de fundo suave */
            color: #333; /* Cor do texto */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Container centralizado para a página */
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 1000px;
        }

        /* Estilo do cabeçalho */
        h1 {
            text-align: center;
            font-size: 2em;
            color: #e67e22;
            margin-bottom: 20px;
        }

        /* Estilo da tabela */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Estilo para as células da tabela */
        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        /* Cor de fundo do cabeçalho da tabela */
        th {
            background-color: #f39c12;
            color: white;
            font-weight: bold;
        }

        /* Cor alternada para as linhas */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Cor do texto nas linhas */
        td {
            color: #555;
        }

        /* Estilo da linha ao passar o mouse */
        tr:hover {
            background-color: #f1f1f1;
        }

        /* Estilo da mensagem de erro (quando não houver clientes) */
        .no-client-message {
            text-align: center;
            font-size: 1.2em;
            color: #e74c3c;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Listagem de Clientes</h1>

        <?php
            // Verificando se existem resultados
            if (mysqli_num_rows($resultado) > 0) {
                echo "<table>
                        <tr>
                            <th>ID Cliente</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Senha</th>
                            <th>Foto</th>
                        </tr>";

                // Loop para listar os clientes
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>
                            <td>" . $linha['id_cli'] . "</td>
                            <td>" . $linha['nome'] . "</td>
                            <td>" . $linha['email'] . "</td>
                            <td>" . $linha['senha'] . "</td>
                            <td>" . $linha['foto'] . "</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='no-client-message'>Nenhum cliente encontrado.</p>";
            }

            // Fechar a conexão
            mysqli_close($conexao);
        ?>
    </div>
</body>
</html>