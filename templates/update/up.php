<?php 
include "../../scripts/conexao.php";
include "../../scripts/secure.php";
$id = $_GET['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$phone = $_POST['num'];
$nasc = $_POST['nasc'];
$instrumento = $_POST['instrumento'];
$funcao = $_POST['funcao'];

$sql = "UPDATE `integrantes` SET `nome`='$nome',`email`='$email',`senha`='$senha',`instrumento`='$instrumento',`data_nascimento`='$nasc',`funcao`='$funcao',`telefone`='$phone' WHERE `id`=$id"


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="up.css">
    <title>Atualização</title>
    <link rel="shortcut icon" href="/Site-BandaSantaCecilia/imagens/favicon.png" type="image/x-icon">
    
</head>
<body>
    <header>
        <h1>Atualização</h1>
    </header>
    <main>
        <?php 
        mysqli_query($conn,$sql)
        ?>
            <p><?=$nome?> Atualizado(a)!</p>
        <button onclick="javascript:window.location.href='/Site-BandaSantaCecilia/'">Voltar</button>
    </main>
</body>
</html>