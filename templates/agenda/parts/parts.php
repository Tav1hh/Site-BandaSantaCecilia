<?php 
include "../../../scripts/conexao.php";
include "../../../scripts/secure.php";

$id = $_GET['id'];
$nome = $_GET['evento'];

$sql = "SELECT * FROM agenda WHERE id = '$id'";
$resp = mysqli_query($conn,$sql) ;
$linha = mysqli_fetch_array($resp)

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banda Santa Cecilia</title>
    <link rel="shortcut icon" href="/Site-BandaSantaCecilia/imagens/favicon.png" type="image/x-icon">
    
    <link rel="stylesheet" href="/Site-BandaSantaCecilia/estilos/style.css">
    <link rel="stylesheet" href="/Site-BandaSantaCecilia/estilos/cards.css">
    <link rel="stylesheet" href="parts.css">
    <script src="/Site-BandaSantaCecilia/scripts/script.js"></script>
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
            <nav>
                <h2 id="nome"><?=$nome?></h2>
                <button onclick="javascript:history.go(-1)" class="btn-back"></button>

            </nav>

            <div class="evento">
                <h2>Dia: <?php 
                $dia = substr($linha['dia'],-2); 
                $mes = substr($linha['dia'],-5,-3);
                $ano = substr($linha['dia'],-10,-6);
                $meses = ['janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];

                if ($mes[0] == '0')
                { $mes = $mes[1];};

                echo "$dia de $meses[$mes]"
                ?></h2>
                <h2>Hora: <?=substr($linha['hora'],0,5)?></h2>
                <h2>Descrição:</h2>
                <p><?=$linha['descricao']?></p>
            </div>
        </article>
    </main>
    <script>
        var h2 = document.getElementById('nome');
        if (h2.clientHeight > 50) {

            h2.style.transform = "translateY(-20px)";

        }
    </script>
    <script src="/Site-BandaSantaCecilia/scripts/nav.js"></script>
    <script src="/Site-BandaSantaCecilia/scripts/header.js"></script>
</body>
</html>