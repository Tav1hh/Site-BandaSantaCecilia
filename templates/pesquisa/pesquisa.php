<?php 
include "../../scripts/conexao.php";
include "../../scripts/secure.php";

if (isset($_POST['psq'])) {
    // echo "Pesquisa";

    $psq = $_POST['psq'];
    
    $sql = "SELECT * FROM integrantes WHERE funcao = 'Aluno' and nome LIKE '%$psq%' or funcao = 'Aluno' and instrumento LIKE '%$psq%'";
    $alunos = mysqli_query($conn,$sql);
    
    $sql = "SELECT * FROM integrantes WHERE funcao = 'Integrante' and nome LIKE '%$psq%' or funcao = 'Integrante' and instrumento LIKE '%$psq%' or funcao = 'Administrador' and nome LIKE '%$psq%' and id >1 or funcao = 'Administrador' and instrumento LIKE '%$psq%' and id >1";
    $musicos = mysqli_query($conn,$sql);

    $sql = "SELECT * FROM acervo_musical WHERE nome LIKE '%$psq%'";
    $musicas = mysqli_query($conn,$sql);

    $sql = "SELECT * FROM agenda WHERE evento LIKE '%$psq%' or dia Like '%$psq%'";
    $agenda = mysqli_query($conn,$sql);

}


// $sql = "SELECT * FROM Integrantes WHERE funcao = 'Aluno'";
// $alunos = mysqli_query($conn,$sql) ;


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
    <link rel="stylesheet" href="pesquisa.css">
    <script src="/Site-BandaSantaCecilia/scripts/script.js"></script>
</head>
<style>
    .card-agenda{
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
                <h2>Pesquisa</h2>
                <div>
                    <!-- <button onclick="javascript:window.location = '/Site-BandaSantaCecilia/templates/cadastrar/cadastrar.php'" class="btn-add"></button>
                    <button onclick="javascript:window.location = '/Site-BandaSantaCecilia/templates/editar/editar.php?fun=Aluno'" class="btn-edit"></button> -->
                </div>
                
            </nav>
            <hr>
            <h3>Alunos</h3>
            <?php 
            // Alunos
                while ($linha = mysqli_fetch_assoc($alunos)) {
                    echo '
                    <div class="card">
                        <div class="card-person" onclick="javascript:document.location.href=\'/Site-BandaSantaCecilia/templates/perfil/perfil.php?id='.$linha['id'].'\'">
                        <img src="/Site-BandaSantaCecilia/imagens/person.png" alt="">
                            <div>
                                <h2>'.$linha['nome'] .'</h2>
                                <p>'.$linha['instrumento'] .'</p>
                                <p>Lição: '.$linha['licao'] .'</p>
                            </div>
                        </div>
                    </div>';
                };
            ?>
            <hr>
            <h3>Integrantes</h3>
            <?php 
            // Integrantes
                while ($linha = mysqli_fetch_assoc($musicos)) {
                    echo '
                    <div class="card">
                        <div class="card-person" onclick="javascript:document.location.href=\'/Site-BandaSantaCecilia/templates/perfil/perfil.php?id='.$linha['id'].'\'">
                        <img src="/Site-BandaSantaCecilia/imagens/person.png" alt="">
                            <div>
                                <h2>'.$linha['nome'] .'</h2>
                                <p>'.$linha['instrumento'] .'</p>
                                <p>Classe: '.$linha['classe'] .'</p>
                            </div>
                        </div>
                    </div>';
                };
            ?>
            <hr>
            <h3>Partituras</h3>
            <?php 
            // Músicas
            while ($linha = mysqli_fetch_assoc($musicas)) {
                echo '
                <div class="card card-part" onclick="javascript:document.location.href=\'/Site-BandaSantaCecilia/templates/partituras/parts/parts.php?id='.$linha['id'].'&nome='.$linha['nome'].'\'">
                    <div class="card-person">
                    <img src="/Site-BandaSantaCecilia/imagens/parts2.png" alt="">
                        <div>
                            <h2>'.$linha['nome'].'</h2>
                        </div>
                    </div>
                </div>
                ';
            };
                
            ?>
            <hr>
            <h3>Agenda</h3>
            <?php 
            while ($linha = mysqli_fetch_assoc($agenda)) {
                echo '
                <div class="card card-agenda" onclick="javascript:document.location.href=\'/Site-BandaSantaCecilia/templates/agenda/parts/parts.php?id='.$linha['id'].'&evento='.$linha['evento'].'\'">
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
<!-- 
            <div class="card">
                <div class="card-person">
                <img src="/Site-BandaSantaCecilia/imagens/person.png" alt="">
                    <div>
                        <h2></h2>
                        <p></p>
                        <p></p>
                    </div>
                </div>
                <div class="card-botoes">
                    <button onclick="javascript:location.href='alunos.php?alt=up&id='"><img src="/Site-BandaSantaCecilia/imagens/up.png"></button>
                    <button onclick="javascript:location.href='alunos.php?alt=down&id='"><img src="/Site-BandaSantaCecilia/imagens/down.png"></button>
                </div>
            </div> -->

        </article>
    </main>
    <script src="/Site-BandaSantaCecilia/scripts/nav.js"></script>
    <script src="/Site-BandaSantaCecilia/scripts/header.js"></script>
</body>
</html>