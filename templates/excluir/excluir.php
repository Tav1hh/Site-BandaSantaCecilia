<?php 
include "../../scripts/conexao.php";

$id = $_GET['id'];

$sql = "delete from `integrantes` where `id`= $id";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="excluir.css">
    <title>Exclusão</title>
</head>
<body>
    <header>
        <h1>Exclusão</h1>
    </header>
    <main>
        <?php 
        mysqli_query($conn,$sql)
        ?>
            <p>Úsuario Excluido(a)!</p>
        <button onclick="javascript:window.location.href='/Site-BandaSantaCecilia/'">Voltar</button>
    </main>
</body>
</html>