<?php 
include "../../../scripts/conexao.php";
include "../../../scripts/secure.php";

$id = $_GET['id'];
$nome = $_GET['nome'];

$sql = "SELECT * FROM partituras WHERE idmusica = '$id' order by instrumento";
$resp = mysqli_query($conn,$sql) ;

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
                <?php 
                if ($_SESSION['adm'] == "Administrador") {
                    echo '<div>
                    <button onclick="javascript:history.go(-1)" class="btn-back"></button>
                    <button onclick="javascript:window.location = \'/Site-BandaSantaCecilia/templates/partituras/editar/editar.php?id='.$id.'&nome='.$nome.'\'  "class="btn-del"></button>
                </div>';
                }
                ?>

            </nav>

            <?php 
                while ($linha = mysqli_fetch_assoc($resp)) {
                    echo '
                    <div class="card" onclick="javascript:location.href=\''.$linha['path'].'\'">
                        <div class="card-person">
                        <img src="/Site-BandaSantaCecilia/imagens/parts2.png" alt="">
                            <div>
                                <h2>'.$linha['instrumento'].'</h2>
                            </div>
                        </div>
                    </div>';
                };
            ?>
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