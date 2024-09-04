<?php 
include "../../scripts/conexao.php";
include "../../scripts/secure.php";

$sql = "SELECT * FROM agenda order by 'date' desc ";
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
<style>
    .card{
        cursor: pointer;
    }
</style>
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
                <h2>Agenda</h2>

                <?php 
                if ($_SESSION['adm'] == "Administrador") {
                    echo "
                    <div>
                        <button onclick=\"javascript:window.location = '/Site-BandaSantaCecilia/templates/agenda/cadastrar/cadastrar.php'\" class=\"btn-add\"></button>
                        <button onclick=\"javascript:window.location = '/Site-BandaSantaCecilia/templates/agenda/editar/editar.php'\" class=\"btn-edit\"></button>
                    </div>
                    ";
                }
                ?>
                <!-- <div>
                    <button onclick="javascript:window.location = '/Site-BandaSantaCecilia/templates/agenda/cadastrar/cadastrar.php'" class="btn-add"></button>
                    <button onclick="javascript:window.location = '/Site-BandaSantaCecilia/templates/agenda/editar/editar.php'" class="btn-edit"></button>
                </div> -->
                
            </nav>

            <?php 
                while ($linha = mysqli_fetch_assoc($resp)) {
                    echo '
                    <div class="card" onclick="javascript:document.location.href=\'/Site-BandaSantaCecilia/templates/agenda/parts/parts.php?id='.$linha['id'].'&evento='.$linha['evento'].'\'">
                    <div class="card-person">
                    <img src="/Site-BandaSantaCecilia/imagens/person.png" alt="">
                    <div>
                        <h2>'.

                        $dia = substr($linha['dia'],-2); 
                        $mes = substr($linha['dia'],-5,-3);
                        $ano = substr($linha['dia'],-10,-6);
                        $meses = ['janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];

                        if ($mes[0] == '0')
                        { $mes = $mes[1];};

                        echo " de $meses[$mes]"
                        // echo "$linha[dia]"
                        
                        .'</h2>
                        <p>'.$linha['evento'].'</p>
                        <p>'.substr($linha['hora'],-8,-3).'</p>
                    </div>
                </div>
            </div>';
                };
            ?>            
        </article>
    </main>
    <script src="/Site-BandaSantaCecilia/scripts/nav.js"></script>
    <script src="/Site-BandaSantaCecilia/scripts/header.js"></script>
</body>
</html>