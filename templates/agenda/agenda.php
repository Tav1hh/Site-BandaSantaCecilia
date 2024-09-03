<?php 
include "../../scripts/conexao.php";

$sql = "SELECT * FROM agenda order by 'date' ";
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
                <h2>Agenda</h2>
                <div>
                    <button onclick="javascript:window.location = '/Site-BandaSantaCecilia/templates/agenda/cadastrar/cadastrar.html'" class="btn-add"></button>
                    <button onclick="javascript:window.location = '/Site-BandaSantaCecilia/templates/agenda/editar/editar.php'" class="btn-edit"></button>
                </div>
                
            </nav>

            <?php 
                while ($linha = mysqli_fetch_assoc($resp)) {
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
        </article>
    </main>
    <script src="/Site-BandaSantaCecilia/scripts/nav.js"></script>
    <script src="/Site-BandaSantaCecilia/scripts/header.js"></script>
</body>
</html>