<?php 
include "../../scripts/conexao.php";
include "../../scripts/secure.php";

$id = $_GET['id'];

$sql = "SELECT * FROM integrantes WHERE id = '$id'";
$resp = mysqli_query($conn,$sql) ;
$linha = mysqli_fetch_array($resp)

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
    <link rel="stylesheet" href="perfil.css">
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
                <h2>Perfil</h2>
                <div>
                    <button onclick="javascript:history.go(-1)" class="btn-back"></button>
                    <?php echo $id == $_SESSION['id']? '<button class="btn-edit" onclick="editar()"></button>' : '';?>
                </div>
            </nav>

            <div class="perfil">                
                <div class="perfil-conteudo">
                    <img class="foto-principal" src="/Site-BandaSantaCecilia/imagens/account.png" alt="Foto de Perfil">
                    <label for="ifoto" class="edit-foto"><img src="/Site-BandaSantaCecilia/imagens/btn-edit.png" alt="Foto de Perfil"></label>
                    <input type="file" name="foto" id="ifoto">
                    <div>
                        <h2><?=$linha['nome']?></h2>
                        <p><?=$linha['funcao'] == 'Administrador' ? 'Integrante': $linha['funcao']?></p>
                        <p><?=$linha['instrumento']?></p>
                        <p><?php 
                        // Definindo as datas
                        $data_inicial = new DateTime($linha['data_matricula']);
                        $data_final = new DateTime(date('Y-m-d'));

                        // Calculando a diferença
                        $diferenca = $data_inicial->diff($data_final);
                        echo $diferenca->y . " Anos, " . $diferenca->m . " Meses, " . $diferenca->d . " Dias.";
                        ?></p>
                        <p>Classe: <?=$linha['classe']?></p>
                    </div>
                </div>
                <h3>Sobre Mim</h3>
                <p class="perfil-bio">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur sunt quos nostrum asperiores accusantium beatae impedit, earum placeat aperiam corporis totam consequatur sed doloribus officia libero! Voluptate eveniet nam quasi.</p>
            </div>
        </article>
    </main>
    <script>
        var h2 = document.getElementById('nome');
        if (h2.clientHeight > 50) {

            h2.style.transform = "translateY(-20px)";
        }
    </script>
    <script src="/Site-BandaSantaCecilia/scripts/nav.js"></script>
    <script src="/Site-BandaSantaCecilia/scripts/header.js"></script>
</body>
</html>