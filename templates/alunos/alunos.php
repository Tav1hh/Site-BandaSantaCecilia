<?php 
include "../../scripts/conexao.php";

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


$sql = "SELECT * FROM Integrantes WHERE aluno_musico = 'Aluno'";
$resp = mysqli_query($conn,$sql) ;


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banda Santa Cecilia</title>
    <link rel="stylesheet" href="/Site-BandaSantaCecilia/estilos/style.css">
    <link rel="stylesheet" href="/Site-BandaSantaCecilia/estilos/cards.css">
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
                <h2>Alunos</h2>
                <div>
                    <button onclick="javascript:window.location = '/Site-BandaSantaCecilia/templates/cadastrar/cadastrar.html'" class="btn-add"></button>
                    <button onclick="javascript:window.location = '/Site-BandaSantaCecilia/templates/editar/editar.php?fun=Aluno'" class="btn-edit"></button>
                </div>
                
            </nav>

            <?php 
                while ($linha = mysqli_fetch_assoc($resp)) {
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
                        <div class="card-botoes">
                            <button onclick="javascript:location.href=\'alunos.php?alt=up&id='.$linha['id'].'&licao='.$linha['licao'].'\'"><img src="/Site-BandaSantaCecilia/imagens/up.png"></button>
                            <button onclick="javascript:location.href=\'alunos.php?alt=down&id='.$linha['id'].'&licao='.$linha['licao'].'\'"><img src="/Site-BandaSantaCecilia/imagens/down.png"></button>
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