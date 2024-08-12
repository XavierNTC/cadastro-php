<html>
<head>
<title>Cadastro</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<body >
 
<?php
 
 
include "testa_banco.php";
 
$nome = $_POST['nome'];
$cidade = $_POST['cidade'];
$telefone = $_POST['telefone'];
$data_nasc = $_POST['dataNasc'];
$genero = $_POST['opcao'];
$obs = $_POST['obs'];
$int1 = $_POST['opcb1'];
$int2 = $_POST['opcb2'];
$int3 = $_POST['opcb3'];
$int4 = $_POST['opcb4'];
$int5 = $_POST['opcb5'];



 $sql = 'INSERT INTO tb_usuario (nome, cidade, telefone, data_nascimento, genero, observacao, interesse) VALUES 
 (\''.$nome.'\',\''.$cidade.'\',\''.$telefone.'\',\'' .$data_nasc.'\',\''.$genero.'\',\''.$obs.'\',\''.$int1.$int2.$int3.$int4.$int5.'\')';
 
 
 if (mysqli_query($_con, $sql)) {
   echo "<br> Novo registro criado com sucesso";
} else {
   echo "<br>Error: " . $sql . "<br>" . mysqli_error($_con);
}
mysqli_close($_con);
 
 
?>
 
</body>
</html>