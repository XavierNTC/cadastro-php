<?php
 
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "db_cadastro";
$_con = mysqli_connect($servidor, $usuario, $senha, $banco);
 
 
if($_con===false)
 
{
 
echo "N&atilde;oo foi poss&iacute;vel conectar ao MySQL ";
 
exit;
 
}
else
 
{
 
echo "Conex&atilde;o Estabelecida";
}
   
?>