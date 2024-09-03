<?php 
include "../../scripts/conexao.php";
$id = $_GET['id'];
$nome = $_POST['nome'];
$phone = $_POST['num'];
$nasc = $_POST['nasc'];
$instrumento = $_POST['instrumento'];
$aluno_musico = $_POST['aluno_musico'];

$sql = "UPDATE `integrantes` SET `nome`='$nome',`instrumento`='$instrumento',`data_nascimento`='$nasc',`aluno_musico`='$aluno_musico',`telefone`='$phone' WHERE `id`=$id"


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="up.css">
    <title>Atualização</title>
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