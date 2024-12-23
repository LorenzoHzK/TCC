<?php
include('autenticacao.php');
include('header.html');

// Verifica se o usuário está logado
if (!isset($_SESSION['email'])) {
    echo "Você precisa estar logado para ver seu perfil.";
    exit;
}

// Conexão com o banco de dados
$con = mysqli_connect('localhost', 'root', '', 'crypto_galaxy');
if (!$con) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

$email = $_SESSION['email'];
$sql = "SELECT * FROM clientes WHERE email = '$email'";
$exe = mysqli_query($con, $sql);

if ($res = mysqli_fetch_array($exe)) {
    $nome = $res['nome'];
    $foto = $res['foto']; // Obtém o caminho da foto armazenado no banco de dados
} else {
    echo "Usuário não encontrado.";
    exit;
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="./Estilos/perfil.css">
</head>
<body>
    <!-- Container do perfil -->
    <div class="profile-container">
        <!-- Imagem do perfil -->
        <div class="profile-image">
    <!-- Exibe a imagem do banco de dados ou uma imagem padrão -->
            <img src="<?php echo !empty($foto) ? $foto : 'fotos/default.png'; ?>">
        </div>

        <!-- Informações do perfil -->
        <div class="profile-info">
            <h1>Olá, <?php echo $nome; ?></h1>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <div class="profile-actions">
                <a class="btn update" href="upd_user.php?email=<?php echo $email; ?>">Alterar Dados</a>
                <a class="btn delete" href="del_user.php?email=<?php echo $email; ?>">Excluir Conta</a>
            </div>
        </div>
    </div>
</body>
</html>