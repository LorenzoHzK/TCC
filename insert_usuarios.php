<?php
    $email=$_POST['email'];
    $senha=$_POST['senha'];
    $conexao = mysqli_connect('localhost','root','','crypto_galaxy');
    $instrucao =  "INSERT INTO clientes (email, senha) VALUES ('$email', '$senha')";
    echo $instrucao;
    $executar = mysqli_query($conexao, $instrucao);
    if ($executar==1){  
        header('location:login.php');
    }
    else{
        echo "Erro!";
    }
    $fechar = mysqli_close($conexao);
?>