<?php 
include "../../../scripts/conexao.php";

$nome = $_POST['nome'];
$date = $_POST['date'];
$hour = $_POST['hour'];

$datetime = "$date-$hour";

$sql = "INSERT INTO `agenda`(`evento`, `data`, `dia`, `hora`) VALUES ('$nome', '$datetime','$date','$hour')";
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
        mysqli_query($conn,$sql)
        ?>
            <p>Evento:<?=$nome?> Salvo(a)!</p>
        <button onclick="javascript:window.location.href='/Site-BandaSantaCecilia/'">Voltar</button>
    </main>
</body>
</html>