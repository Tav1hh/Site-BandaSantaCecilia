<?php 
include "../../scripts/conexao.php";
$sql = "SELECT * FROM acervo_musical Order By nome ";

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
    <link rel="stylesheet" href="partituras.css">
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
                <h2>Partituras</h2>
                <div>
                    <button onclick="javascript:window.location = '/Site-BandaSantaCecilia/templates/partituras/enviar/enviar.html'" class="btn-add"></button>
                    <!-- <button onclick="javascript:window.location = '/Site-BandaSantaCecilia/templates/partituras/editar/editar.php'" class="btn-edit"></button> -->
                </div>
                
            </nav>

            <?php 

                while ($linha = mysqli_fetch_assoc($resp)) {
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
         

        </article>
    </main>
    <script src="/Site-BandaSantaCecilia/scripts/nav.js"></script>
    <script src="/Site-BandaSantaCecilia/scripts/header.js"></script>
</body>
</html>