<?php
include "testa_banco.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de dados</title>
</head>
<body>
<h1> Consultas</h1>
<br>
<?php 
 error_reporting(E_ERROR | E_PARSE);
$res = mysqli_query($_con, "SELECT * FROM tb_usuario");
 
while ($dados = mysqli_fetch_assoc($res)) {
    $id = $dados['id']; 
    $nome = htmlspecialchars($dados['nome']);
    $cidade = htmlspecialchars($dados['cidade']);
    $telefone = htmlspecialchars($dados['telefone']);
    $data_nasc = htmlspecialchars($dados['data_nascimento']);   
    $genero = $dados['genero'] == 'F' ? "Feminino" : ($dados['genero'] == 'M' ? 'Masculino' : 'Prefiro não informar');
    $obs = htmlspecialchars($dados['observacao']);
    $interesses = htmlspecialchars($dados[6]);
    $int1 = false;
    $int2 = false;
    $int3 = false;
    $int4 = false;
    $int5 = false;

    for ($i = 0; $i < strlen($interesses); $i += 3) {
        $sub = substr($interesses, $i, 3);
        if ($sub == "ESP") {
            $int1 = Esportes;
        } else if ($sub == "JOG") {
            $int2 = true;
        } else if ($sub == "FIL") {
            $int3 = true;
        } else if ($sub == "GAS") {
            $int4 = true;
        } else if ($sub == "TEC") {
            $int5 = true;
        }
    }

    echo "<h2>Dados do $nome</h2>";
    echo "<br><p id=\"semMargem\">Identificador: $id
            <br>Telefone: $telefone
            <br>Data de nascimento: $data_nasc
            <br>Cidade: $cidade
            <br>Genero: $genero
            <br>Interesses:<ul>";

    if ($int1) {
        echo "<li>Esportes</li>";
    }
    if ($int2) {
        echo "<li>Jogos</li>";
    }
    if ($int3) {
        echo "<li>Filmes</li>";
    }
    if ($int4) {
        echo "<li>Gastronomia</li>";
    }
    if ($int5) {
        echo "<li>Tecnologia</li>";
    }

    echo "</ul><br>Observação: $obs<hr>";
}

mysqli_close($_con);
?>
</body>
</html>
