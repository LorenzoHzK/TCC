<?php
session_start();
$email = $_POST['email_administrador'];
$senha = $_POST['senha_administrador'];
$conexao = mysqli_connect('localhost','root','','crypto_galaxy');
$sql = "SELECT * FROM administrador WHERE email like '$email'
and senha like '$senha'";
$executar = mysqli_query($conexao, $sql);
$res = mysqli_fetch_array($executar);
if($res['email'] != NULL){
   $_SESSION['email'] = $res['email'];
   $_SESSION['senha'] = $res['senha'];
   header("location:index.php");
}
else{
   echo "Login e/ou senha incorretos";
}
echo $sql;
$fechar = mysqli_close($conexao);
?>