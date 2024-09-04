<?php 
include "../../scripts/conexao.php";
include "../../scripts/secure.php";

if (isset($_GET['alt']) & isset($_GET['id']) & isset($_GET['licao'])) {

    $alt = $_GET['alt'];
    $id = $_GET['id'];
    $licao = $_GET['licao'];

    if ($alt == 'up'){
        $licao = $licao + 1;
        $sql = "UPDATE `integrantes` SET `licao`='$licao' WHERE `id`=$id";
        mysqli_query($conn,$sql);
    }

    if ($alt == 'down'){
        $licao = $licao - 1;
        if ($licao <=1) {
            $licao = 1;
        }
        $sql = "UPDATE `integrantes` SET `licao`='$licao' WHERE `id`=$id";
        mysqli_query($conn,$sql);
    }

}


$sql = "SELECT * FROM Integrantes WHERE funcao = 'Aluno' order by instrumento";
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
                <h2>Alunos</h2>
                <?php 
                if ($_SESSION['adm'] == "Administrador") {
                    echo "
                    <div>
                        <button onclick=\"javascript:window.location = '/Site-BandaSantaCecilia/templates/cadastrar/cadastrar.php'\" class=\"btn-add\"></button>
                        <button onclick=\"javascript:window.location = '/Site-BandaSantaCecilia/templates/editar/editar.php?fun=Aluno'\" class=\"btn-edit\"></button>
                    </div>";
                }
                ?>
                <!-- <div>
                    <button onclick="javascript:window.location = '/Site-BandaSantaCecilia/templates/cadastrar/cadastrar.php'" class="btn-add"></button>
                    <button onclick="javascript:window.location = '/Site-BandaSantaCecilia/templates/editar/editar.php?fun=Aluno'" class="btn-edit"></button>
                </div> -->
                
            </nav>

            <?php 
                while ($linha = mysqli_fetch_assoc($resp)) {
                    echo '
                    <div class="card" >
                        <div class="card-person" onclick="javascript:document.location.href=\'/Site-BandaSantaCecilia/templates/perfil/perfil.php?id='.$linha['id'].'\'">
                        <img src="/Site-BandaSantaCecilia/imagens/person.png" alt="">
                            <div>
                                <h2>'.$linha['nome'] .'</h2>
                                <p>'.$linha['instrumento'] .'</p>
                                <p>Lição: '.$linha['licao'] .'</p>
                            </div>
                        </div>';

                        if ($_SESSION['adm'] == "Administrador") {

                            echo '<div class="card-botoes">
                                <button onclick="javascript:location.href=\'alunos.php?alt=up&id='.$linha['id'].'&licao='.$linha['licao'].'\'"><img src="/Site-BandaSantaCecilia/imagens/up.png"></button>
                                <button onclick="javascript:location.href=\'alunos.php?alt=down&id='.$linha['id'].'&licao='.$linha['licao'].'\'"><img src="/Site-BandaSantaCecilia/imagens/down.png"></button>
                            </div>';
                        }
                    echo '</div>';
                };
            ?>
        </article>
    </main>
    <script src="/Site-BandaSantaCecilia/scripts/nav.js"></script>
    <script src="/Site-BandaSantaCecilia/scripts/header.js"></script>
</body>
</html>