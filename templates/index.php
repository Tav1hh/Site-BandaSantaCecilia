<?php 
include "../scripts/conexao.php";
include "../scripts/secure.php";

$sql = "SELECT * FROM Integrantes WHERE funcao = 'Aluno'";

if ($resp = mysqli_query($conn,$sql)) {
    $totalAlunos = mysqli_num_rows($resp);
} else {
    $totalAlunos = 0;
}

$sql = "SELECT * FROM Integrantes WHERE funcao = 'Integrante' or funcao = 'Administrador'";

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
    <link rel="shortcut icon" href="/Site-BandaSantaCecilia/imagens/favicon.png" type="image/x-icon">
    
    <link rel="stylesheet" href="/Site-BandaSantaCecilia/estilos/style.css">
    <link rel="stylesheet" href="/Site-BandaSantaCecilia/estilos/index.css">
    <script src="../scripts/script.js"></script>
</head>
<body>
    <nav id="menu">

    </nav>
    <main>
        <header id="cabecalho">
            <div class="container"> <button onclick="esconder()"></button> <form action="/Site-BandaSantaCecilia/templates/pesquisa/pesquisa.php" method="POST"> <input class="barra-pesquisa" type="search" name="psq" id="ipsq" placeholder="Buscar.."> <input class="botao-pesquisa" type="submit" value=""> </form> <div> <button onclick="esconder_conta()"></button > <div> <p><?=$_SESSION['nome']?></p> <p><?=$_SESSION['adm']?></p> </div> </div> </div>
            <div class="titulo"> <h1>Corporação Santa Cecilia</h1> <p>São Francisco - GO</p> </div>
            <div class="conta" id="conta">
                <img src="/Site-BandaSantaCecilia/imagens/account.png" alt="">
                <p><?=$_SESSION['adm']?></p>
                <p><?=$_SESSION['nome']?></p>
                <a href="/Site-BandaSantaCecilia/templates/perfil/perfil.php?id=<?=$_SESSION['id']?>">Gerenciar</a>
                <a href="/Site-BandaSantaCecilia/scripts/logout.php">Logout</a>
            </div>
        </header>
        <article>
            <div onclick="javascript:window.location='/Site-BandaSantaCecilia/templates/alunos/alunos.php'">
                <h2>Alunos</h2>
                <img src="../imagens/group.png" alt="">
                <p><?=$totalAlunos?></p>
                <p>Total de Alunos cadastrados</p>
            </div>
            <div onclick="javascript:window.location='/Site-BandaSantaCecilia/templates/integrantes/integrantes.php'">
                <h2>Integrantes</h2>
                <img src="../imagens/groups.png" alt="">
                <p><?=$totalMusicos?></p>
                <p>Total de Integrantes ativos</p>
            </div>
            <div onclick="javascript:window.location='/Site-BandaSantaCecilia/templates/partituras/partituras.php'">
                <h2>Partituras</h2>
                <img src="../imagens/parts.png" alt="">
                <p><?=$totalMusicas?></p>
                <p>Total de Partituras cadastradas</p>
            </div>
        </article>
    </main>
    <script src="../scripts/nav.js"></script>
    <script src="../scripts/header.js"></script>
</body>
</html>