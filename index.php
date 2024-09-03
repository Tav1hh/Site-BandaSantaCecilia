<?php 
include "scripts/conexao.php";

$sql = "SELECT * FROM Integrantes WHERE aluno_musico = 'Aluno'";

if ($resp = mysqli_query($conn,$sql)) {
    $totalAlunos = mysqli_num_rows($resp);
} else {
    $totalAlunos = 0;
}

$sql = "SELECT * FROM Integrantes WHERE aluno_musico = 'Músico'";

if ($resp = mysqli_query($conn,$sql)) {
    $totalMusicos = mysqli_num_rows($resp);
} else {
    $totalMusicos = 0;
}

$sql = "SELECT * FROM acervo_musical";

if ($resp = mysqli_query($conn,$sql)) {
    $totalMusicas = mysqli_num_rows($resp);
} else {
    $totalMusicas = 0;
}



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banda Santa Cecilia</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="index.css">
    <script src="scripts/script.js"></script>
</head>
<body>
    <nav id="menu">

    </nav>
    <main>
        <header id="cabecalho">

        </header>
        <article>
            <div onclick="javascript:window.location='/Site-BandaSantaCecilia/templates/alunos/alunos.php'">
                <h2>Alunos</h2>
                <img src="imagens/group.png" alt="">
                <p><?=$totalAlunos?></p>
                <p>Total de Alunos cadastrados</p>
            </div>
            <div onclick="javascript:window.location='/Site-BandaSantaCecilia/templates/integrantes/integrantes.php'">
                <h2>Integrantes</h2>
                <img src="imagens/groups.png" alt="">
                <p><?=$totalMusicos?></p>
                <p>Total de Integrantes ativos</p>
            </div>
            <div onclick="javascript:window.location='/Site-BandaSantaCecilia/templates/partituras/partituras.php'">
                <h2>Partituras</h2>
                <img src="imagens/parts.png" alt="">
                <p><?=$totalMusicas?></p>
                <p>Total de Partituras cadastradas</p>
            </div>
        </article>
    </main>
    <script src="scripts/nav.js"></script>
    <script src="scripts/header.js"></script>
</body>
</html>