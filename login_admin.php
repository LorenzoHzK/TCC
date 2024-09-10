<?php
session_start();
$host = 'localhost';
$banco = 'nome_do_banco';
$usuario = 'usuario';
$senha = 'senha';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email_administrador'];
    $senha = $_POST['senha_administrador'];

    $stmt = $pdo->prepare("SELECT * FROM administradores WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $administrador = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($senha, $administrador['senha'])) {
            $_SESSION['administrador_logado'] = true;
            header("Location: painel_administrativo.php");
            exit();
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Email não encontrado!";
    }
}
?>