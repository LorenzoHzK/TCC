<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="./Estilos/carrinho.css"> 
</head>
<body>

<?php
include('autenticacao.php');
$email = $_SESSION['email'];
$con = mysqli_connect('localhost', 'root', '', 'crypto_galaxy');
$sql = "SELECT * FROM carrinho, criptos WHERE carrinho.email = '$email' AND carrinho.id_crypto = criptos.id";
$exe = mysqli_query($con, $sql);    
$total = 0;

echo "<div class='cart-container'>";
while ($res = mysqli_fetch_array($exe)) {
    $id_car = $res['id_car'];
    $nome = $res['nome'];
    $valor = $res['valor'];
    $total += $valor;

    echo "<div class='cart-item'>
            <span class='cart-item-name'>Produto: $nome</span>
            <span class='cart-item-price'>Preço: $valor</span>
            <a class='remove-link' href='del_carrinho.php?id=$id_car'>Remover</a>
          </div>";
}
echo "<div class='cart-total'>O valor total é: <b>$total</b></div>";
echo "<a class='continue-shopping' href='ver_cripto.php'>Comprar mais</a>";
echo "</div>";

$fecha = mysqli_close($con);
?>

</body>
</html>