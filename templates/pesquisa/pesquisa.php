<?php 
include "../../scripts/conexao.php";

if (isset($_POST['psq'])) {
    // echo "Pesquisa";

    $psq = $_POST['psq'];
    
    $sql = "SELECT * FROM integrantes WHERE funcao = 'Aluno' and nome LIKE '%$psq%'";
    $alunos = mysqli_query($conn,$sql);
    
    $sql = "SELECT * FROM integrantes WHERE funcao = 'Músico' and nome LIKE '%$psq%'";
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
    <link rel="stylesheet" href="/Site-BandaSantaCecilia/estilos/style.css">
    <link rel="stylesheet" href="/Site-BandaSantaCecilia/estilos/cards.css">
    <link rel="stylesheet" href="pesquisa.css">
    <script src="/Site-BandaSantaCecilia/scripts/script.js"></script>
</head>
<body>
    <nav id="menu">

    </nav>
    <main>
        <header id="cabecalho">

        </header>
        <article>
            <nav>
                <h2>Pesquisa</h2>
                <div>
                    <!-- <button onclick="javascript:window.location = '/Site-BandaSantaCecilia/templates/cadastrar/cadastrar.html'" class="btn-add"></button>
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
                        <div class="card-person">
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
            <h3>Músicos</h3>
            <?php 
            // Músicos
                while ($linha = mysqli_fetch_assoc($musicos)) {
                    echo '
                    <div class="card">
                        <div class="card-person">
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
                <div class="card">
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