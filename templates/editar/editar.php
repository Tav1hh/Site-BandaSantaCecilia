<?php 
include "../../scripts/conexao.php";
include "../../scripts/secure.php";

$fun = $_GET['fun'];
if ($fun == 'Integrante') {
    $sql = "SELECT * FROM Integrantes WHERE funcao = 'Integrante' or funcao = 'Administrador' order by instrumento";
    
} else {
    $sql = "SELECT * FROM Integrantes WHERE funcao = '$fun' order by instrumento";
}

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
    <link rel="stylesheet" href="editar.css">
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
                <h2>Editar</h2>
                <div>
                    <button onclick="javascript:history.go(-1)" class="btn-back"></button>
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
                            </div>
                        </div>
                        <div class="card-botoes">
                            <button class="btn-edit" onclick="javascript:window.location.href=\'/Site-BandaSantaCecilia/Templates/update/update.php?id='.$linha['id'].'\'"></button>
                            <button class="btn-del" onclick="javascript:window.location.href=\'/Site-BandaSantaCecilia/Templates/excluir/excluir.php?id='.$linha['id'].'\'"></button>
                        </div>
                    </div>';
                };
            
            
            ?>

            <!-- <div class="card">
                <div class="card-person">
                    <img src="/Site-BandaSantaCecilia/imagens/person.png" alt="">
                    <div>
                        <h2>Otávio Santiago</h2>
                        <p>Saxofone Tenor</p>
                        <p>Lição 15</p>
                    </div>
                </div>
                <div class="card-botoes">
                    <button class="btn-edit"></button>
                    <button class="btn-del" onclick="javascript:window.location.href='../excluir/excluir.php'"></button>
                </div>
            </div> -->

            

        </article>
    </main>
    <script src="/Site-BandaSantaCecilia/scripts/nav.js"></script>
    <script src="/Site-BandaSantaCecilia/scripts/header.js"></script>
</body>
</html>