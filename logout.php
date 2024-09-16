<?php
session_start();
$_SESSION['email'] = null;
session_destroy();
echo "Logout realizado com sucesso!<br><br>
<a href='login.html'>Entrar novamente</a>";
?>