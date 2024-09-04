<?php 
include "../../scripts/secure.php";
include "../../scripts/conexao.php";

if (isset($_GET['alt']) & isset($_GET['id']) & isset($_GET['classe'])) {

    $alt = $_GET['alt'];
    $id = $_GET['id'];
    $classe = $_GET['classe'];

    if ($alt == 'up'){
        if ($classe == "A") {
            $classe = "A";
        }
        if ($classe == "B") {
            $classe = "A";
        }
        if($classe == "C") {
            $classe = "B";
        }

        $sql = "UPDATE `integrantes` SET `classe`='$classe' WHERE `id`=$id";
        mysqli_query($conn,$sql);
    }

    if ($alt == 'down'){
        if ($classe == "C") {
            $classe = "C";
        }
        
        if ($classe == "B") {
            $classe = "C";
        }

        if ($classe == "A") {
            $classe = "B";
        }

    
        $sql = "UPDATE `integrantes` SET `classe`='$classe' WHERE `id`=$id";
        mysqli_query($conn,$sql);
    }

}




$sql = "SELECT * FROM Integrantes WHERE funcao = 'Integrante' or funcao = 'Administrador' order by instrumento";
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
                <h2>Integrantes</h2>
                <?php 
                if ($_SESSION['adm'] == "Administrador") {
                    echo "
                    <div>
                        <button onclick=\"javascript:window.location = '/Site-BandaSantaCecilia/templates/cadastrar/cadastrar.php'\" class=\"btn-add\"></button>
                        <button onclick=\"javascript:window.location = '/Site-BandaSantaCecilia/templates/editar/editar.php?fun=Integrante'\" class=\"btn-edit\"></button>
                    </div>";
                }
                ?>
                <!-- <div>
                    <button onclick="javascript:window.location = '/Site-BandaSantaCecilia/templates/cadastrar/cadastrar.php'" class="btn-add"></button>
                    <button onclick="javascript:window.location = '/Site-BandaSantaCecilia/templates/editar/editar.php?fun=Integrante'" class="btn-edit"></button>
                </div> -->
                
            </nav>
            <?php 

                while ($linha = mysqli_fetch_assoc($resp)) {
                    echo '
                    <div class="card">
                        <div class="card-person" onclick="javascript:document.location.href=\'/Site-BandaSantaCecilia/templates/perfil/perfil.php?id='.$linha['id'].'\'">
                        <img src="/Site-BandaSantaCecilia/imagens/person.png" alt="">
                            <div>
                                <h2>'.$linha['nome'] .'</h2>
                                <p>'.$linha['instrumento'] .'</p>
                                <p>Classe: '.$linha['classe'] .'</p>
                            </div>
                        </div>';
                        if ($_SESSION['adm'] == "Administrador") {

                            echo '<div class="card-botoes">
                                <button onclick="javascript:location.href=\'integrantes.php?alt=up&id='.$linha['id'].'&classe='.$linha['classe'].'\'"><img src="/Site-BandaSantaCecilia/imagens/up.png"></button>
                                <button onclick="javascript:location.href=\'integrantes.php?alt=down&id='.$linha['id'].'&classe='.$linha['classe'].'\'"><img src="/Site-BandaSantaCecilia/imagens/down.png"></button>
                            </div>';
                        }
                    echo '</div>';
                };
            
            
            ?>

            <!-- <div class="card">
                <div class="card-person">
                    <img src="/Site-BandaSantaCecilia/imagens/person.png" alt="">
                    <div>
                        <h2>Otávio Santiago</h2>
                        <p>Saxofone Tenor</p>
                        <p>Classe A</p>
                    </div>
                </div>
                <div class="card-botoes">
                    <button><img src="/Site-BandaSantaCecilia/imagens/up.png" alt=""></button>
                    <button><img src="/Site-BandaSantaCecilia/imagens/down.png" alt=""></button>
                </div>
            </div> -->

            
            
            

        </article>
    </main>
    <script src="/Site-BandaSantaCecilia/scripts/nav.js"></script>
    <script src="/Site-BandaSantaCecilia/scripts/header.js"></script>
</body>
</html>