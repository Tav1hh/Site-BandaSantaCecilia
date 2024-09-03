<?php
include "../../../scripts/conexao.php";

$id = $_GET['id'];

if(isset($_GET['idm'])) {
    $idm = $_GET['idm'];
    $path = $_GET['path'];

    // Deleta a Partitura do BD e da Pasta
    $sql = "delete from partituras where id=$idm";
    mysqli_query($conn,$sql);
    if (file_exists("C:/xampp/htdocs/" . $path)) {
            unlink("C:/xampp/htdocs/" . $path);
        }

        
}


$sql = "select * from partituras where idmusica=$id";
$res = mysqli_query($conn,$sql);
$total = mysqli_num_rows($res);

// Verifica se era a ultima partitura
if ($total == 0) {
    // Pega o nome para poder deletar a pasta
    $sql = "SELECT * FROM acervo_musical WHERE id= '$id'";
    $resp = mysqli_query($conn,$sql);
    $nome = mysqli_fetch_array($resp)[1];
    // Deleta a Música
    $sql = "delete from acervo_musical where id=$id";
    mysqli_query($conn,$sql);
    rmdir("C:/xampp/htdocs/Site-BandaSantaCecilia/Partituras/" . $nome);
    header("Location: /Site-BandaSantaCecilia/");
    exit();
};

$sql = "SELECT * FROM partituras WHERE idmusica= '$id'";
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
    <link rel="stylesheet" href="../parts/parts.css">
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
                <h2>Excluir</h2>
                <div>
                    <button onclick="javascript:history.go(-1)" class="btn-back"></button>
                </div>
                
            </nav>

            <?php 

                while ($linha = mysqli_fetch_assoc($resp)) {
                    echo '
                    <div class="card" >
                        <div class="card-person">
                        <img src="/Site-BandaSantaCecilia/imagens/parts2.png" alt="">
                            <div>
                                <h2>'.$linha['instrumento'] .'</h2>
                            </div>
                        </div>
                        <div class="card-botoes">
                            <button class="btn-del" onclick=\'javascript:window.location = "/Site-BandaSantaCecilia/templates/partituras/editar/editar.php?id='.$id.'&idm='.$linha['id'].'&path='.$linha['path'].' "\'></button>
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