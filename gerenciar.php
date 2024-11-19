<?php
include('autenticacao.php');

// Conexão com o banco
$con = mysqli_connect('localhost', 'root', '', 'crypto_galaxy');
if (!$con) {
    die("Erro ao conectar com o banco de dados: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração - Crypto Galaxy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
            margin: 20px 0;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        section {
            margin-bottom: 40px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f39c12;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        form {
            margin-top: 20px;
        }
        input, select {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Administração - Crypto Galaxy</h1>
    <div class="container">

        <!-- Seção de Listagem de Criptomoedas -->
        <section>
            <h2>Criptomoedas</h2>
            <?php
            $sql_criptos = "SELECT * FROM criptos ORDER BY nome ASC";
            $result_criptos = mysqli_query($con, $sql_criptos);

            if (mysqli_num_rows($result_criptos) > 0) {
                echo "<table>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>";
                while ($cripto = mysqli_fetch_assoc($result_criptos)) {
                    echo "<tr>
                            <td>{$cripto['id']}</td>
                            <td>{$cripto['nome']}</td>
                            <td>R$ {$cripto['valor']}</td>
                            <td>
                                <a href='del_cripto.php?id={$cripto['id']}'>Excluir</a> |
                                <a href='upd_cripto.php?id={$cripto['id']}'>Atualizar</a>
                            </td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Nenhuma criptomoeda cadastrada.</p>";
            }
            ?>
        </section>

        <!-- Seção de Listagem de Clientes -->
        <section>
            <h2>Clientes</h2>
            <?php
            $sql_clientes = "SELECT id_cli, nome, email, senha FROM clientes";
            $result_clientes = mysqli_query($con, $sql_clientes);

            if (mysqli_num_rows($result_clientes) > 0) {
                echo "<table>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Senha</th>
                        </tr>";
                while ($cliente = mysqli_fetch_assoc($result_clientes)) {
                    echo "<tr>
                            <td>{$cliente['id_cli']}</td>
                            <td>{$cliente['nome']}</td>
                            <td>{$cliente['email']}</td>
                            <td>{$cliente['senha']}</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Nenhum cliente encontrado.</p>";
            }
            ?>
        </section>

        <!-- Formulário para Adicionar Criptomoedas -->
        <section>
            <h2>Adicionar Nova Criptomoeda</h2>
            <form action="inserir.php" method="post" enctype="multipart/form-data">
                <label for="arquivo">Escolher imagem:</label>
                <input type="file" name="arquivo" id="arquivo" required>

                <label for="nome">Nome do Produto:</label>
                <input type="text" name="nome" id="nome" required>

                <label for="quant">Quantidade:</label>
                <input type="number" name="quant" id="quant" required>

                <label for="valor">Valor:</label>
                <input type="text" name="valor" id="valor" required>

                <input type="submit" value="Adicionar Criptomoeda">
            </form>
        </section>

    </div>

    <?php
    // Fechar conexão
    mysqli_close($con);
    ?>
</body>
</html>