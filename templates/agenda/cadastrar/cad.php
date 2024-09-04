<?php 
include "../../../scripts/conexao.php";
include "../../../scripts/secure.php";


$nome = $_POST['nome'];
$date = $_POST['date'];
$hour = $_POST['hour'];
$desc = $_POST['descricao'];

$datetime = "$date-$hour";

$sql = "INSERT INTO `agenda`(`evento`, `data`, `dia`, `hora`, `descricao`) VALUES ('$nome', '$datetime','$date','$hour','$desc')";
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
        mysqli_query($conn,$sql)
        ?>
            <p>Evento:<?=$nome?> Salvo(a)!</p>
        <button onclick="javascript:window.location.href='/Site-BandaSantaCecilia/'">Voltar</button>
    </main>
</body>
</html>