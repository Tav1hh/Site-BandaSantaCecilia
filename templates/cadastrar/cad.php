<?php 
include "../../scripts/conexao.php";

$nome = $_POST['nome'];
$phone = $_POST['num'];
$nasc = $_POST['nasc'];
$instrumento = $_POST['instrumento'];
$aluno_musico = $_POST['aluno_musico'];
$data = date('Y/m/d');

$sql = "INSERT INTO `integrantes`(`nome`, `instrumento`, `data_matricula`, `data_nascimento`, `telefone`,`aluno_musico`) 
        VALUES ('$nome', '$instrumento', '$data', '$nasc', '$phone','$aluno_musico')";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cad.css">
    <title>Cadastro</title>
</head>
<body>
    <header>
        <h1>Cadastro</h1>
    </header>
    <main>
        <?php 
        mysqli_query($conn,$sql);
        ?>
            <p><?=$nome?> cadastrado(a)!</p>
        <button onclick="javascript:window.location.href='/Site-BandaSantaCecilia/'">Voltar</button>
    </main>
</body>
</html>