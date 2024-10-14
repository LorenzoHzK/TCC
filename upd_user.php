<?php 
// Arquivo upd_user.php
include('autenticacao.php');

// Verifica se o email está definido
$email = isset($_GET['email']) ? $_GET['email'] : '';
$conexao = mysqli_connect('localhost', 'root', '', 'crypto_galaxy');

// Proteção contra SQL Injection
$email = mysqli_real_escape_string($conexao, $email);

$sql = "SELECT * FROM clientes WHERE email='$email'";
$executar = mysqli_query($conexao, $sql);
$res = mysqli_fetch_array($executar);
mysqli_close($conexao);
?>

<form action="atualizar_user.php" method="post" enctype="multipart/form-data">
    Nome: <input type="text" name="nome" value="<?php echo isset($res['nome']) ? $res['nome'] : ''; ?>"><br>
    Email: <input type="text" name="email" value="<?php echo isset($res['email']) ? $res['email'] : ''; ?>" readonly><br>
    Senha: <input type="password" name="senha"><br>
    Foto de perfil: <input type="file" name="foto"><br>
    <input type="submit" value="Atualizar">
</form>
