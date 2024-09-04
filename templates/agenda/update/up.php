<?php 
include "../../../scripts/conexao.php";
include "../../../scripts/secure.php";

$id = $_GET['id'];
$nome = $_POST['nome'];
$dia = $_POST['date'];
$hour = $_POST['hour'];
$desc = $_POST['descricao'];

$datetime = "$dia-$hour";

$sql = "UPDATE `agenda` SET `evento` = 'Cavalhada', `data` = '$datetime', `dia` = '$dia', `hora` = '$hour', `descricao` = '$desc' WHERE `id` = $id" 
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
            <p>Evento: <?=$nome?> Atualizado(a)!</p>
        <button onclick="javascript:window.location.href='/Site-BandaSantaCecilia/'">Voltar</button>
    </main>
</body>
</html>