<?php 
// Arquivo upd_user.php
include('autenticacao.php');

// Verifica se o email está definido
$email = isset($_GET['email']) ? $_GET['email'] : '';
$conexao = mysqli_connect('localhost', 'root', '', 'crypto_galaxy');

// Proteção contra SQL Injection
$email = mysqli_real_escape_string($conexao, $email);

// Obtém as informações do cliente com o email fornecido
$sql = "SELECT * FROM clientes WHERE email='$email'";
$executar = mysqli_query($conexao, $sql);
$res = mysqli_fetch_array($executar);
mysqli_close($conexao);

// Verifica se houve envio do formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conexao = mysqli_connect('localhost', 'root', '', 'crypto_galaxy');
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $foto = '';

    // Verifica se há uma foto enviada
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $diretorioUploads = 'uploads/';
        
        // Cria o diretório 'uploads' se não existir
        if (!is_dir($diretorioUploads)) {
            mkdir($diretorioUploads, 0777, true);
        }
        
        $foto = $diretorioUploads . basename($_FILES['foto']['name']);
        
        // Move o arquivo enviado para o diretório de uploads
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $foto)) {
            $sql = "UPDATE clientes SET nome='$nome', senha='$senha', foto='$foto' WHERE email='$email'";
        } else {
            echo "<p style='color: red; text-align: center;'>Erro ao fazer upload da foto. Tente novamente.</p>";
        }
    } else {
        // Consulta de atualização sem foto
        $sql = "UPDATE clientes SET nome='$nome', senha='$senha' WHERE email='$email'";
    }

    if (mysqli_query($conexao, $sql)) {
        echo "<p style='color: green; text-align: center;'>Dados atualizados com sucesso!</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Erro ao atualizar os dados: " . mysqli_error($conexao) . "</p>";
    }
    mysqli_close($conexao);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Perfil</title>
    <style>
        /* CSS embutido */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            width: 100%;
            max-width: 400px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        form label {
            display: block;
            text-align: left;
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
            font-weight: bold;
        }
        form input[type="text"],
        form input[type="password"],
        form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        form input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        form input[type="submit"]:hover {
            background-color: #45a049;
        }
        input[readonly] {
            background-color: #e9e9e9;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Atualizar Perfil</h1>
        <form action="upd_user.php?email=<?php echo $email; ?>" method="post" enctype="multipart/form-data">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo isset($res['nome']) ? $res['nome'] : ''; ?>">

            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="<?php echo isset($res['email']) ? $res['email'] : ''; ?>" readonly>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">

            <label for="foto">Foto de perfil:</label>
            <input type="file" name="foto" id="foto">

            <input type="submit" value="Atualizar">
        </form>
    </div>
</body>
</html>