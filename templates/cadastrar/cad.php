<?php 
include "../../scripts/conexao.php";
include "../../scripts/secure.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$phone = $_POST['num'];
$nasc = $_POST['nasc'];
$instrumento = $_POST['instrumento'];
$funcao = $_POST['funcao'];
$data = date('Y/m/d');

$sql = "INSERT INTO `integrantes`(`nome`, `instrumento`, `data_matricula`, `data_nascimento`, `telefone`,`funcao`,`email`,`senha`) 
        VALUES ('$nome', '$instrumento', '$data', '$nasc', '$phone','$funcao','$email','$senha')";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cad.css">
    <title>Cadastro</title>
    <link rel="shortcut icon" href="/Site-BandaSantaCecilia/imagens/favicon.png" type="image/x-icon">
    
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