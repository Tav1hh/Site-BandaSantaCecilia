<?php 
include "../../../scripts/conexao.php";

$sql = "SELECT * FROM agenda order by 'datetime'";

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
    <link rel="stylesheet" href="editar.css">
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
                                <h2>'.$linha['evento'] .'</h2>
                                <p>'.$linha['dia'] .'</p>
                            </div>
                        </div>
                        <div class="card-botoes">
                            <button class="btn-edit" onclick="javascript:window.location.href=\'/Site-BandaSantaCecilia/Templates/agenda/update/update.php?id='.$linha['id'].'\'"></button>
                            <button class="btn-del" onclick="javascript:window.location.href=\'/Site-BandaSantaCecilia/Templates/agenda/excluir/excluir.php?id='.$linha['id'].'\'"></button>
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