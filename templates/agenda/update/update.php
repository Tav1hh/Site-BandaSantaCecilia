<?php 
include "../../../scripts/conexao.php";
include "../../../scripts/secure.php";

$id = $_GET['id'];

$sql = "SELECT * FROM `agenda` WHERE `id` = $id";

$res = mysqli_query($conn,$sql);

while ($linha = mysqli_fetch_assoc($res)){
    $nome = $linha['evento'];
    $data = $linha['data'];
    $dia = $linha['dia'];
    $hora = $linha['hora'];
    $desc = $linha['descricao'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banda Santa Cecilia</title>
    <link rel="shortcut icon" href="/Site-BandaSantaCecilia/imagens/favicon.png" type="image/x-icon">
    
    <link rel="stylesheet" href="/Site-BandaSantaCecilia/estilos/style.css">
    <link rel="stylesheet" href="update.css">
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
                <h2>Atualizar</h2>
                <button onclick="javascript:history.go(-1)"></button>

            </nav>
            <form action="up.php?id=<?=$id?>" method="post">
                <div>
                    <label for="inome">Nome:</label>
                    <input type="text" name="nome" id="inome" required value="<?=$nome?>">
                </div>
                <div>
                    <label for="idate">Data:</label>
                    <input type="date" name="date" id="idate" required value="<?=$dia?>">
                </div>
                <div>
                    <label for="ihour">Hora:</label>
                    <input type="time" name="hour" id="ihour" required value="<?=$hora?>">
                </div>
                <div class="desc">
                    <label for="idesc">Descrição:</label>
                    <textarea name="desc" id="idesc" value="<?=$desc?>"></textarea>
                </div>
                <div class="env">
                    <input type="submit" value="Atualizar">
                    <input type="reset" value="Limpar">
                </div>
            </form>
        </article>
    </main>
    <script src="/Site-BandaSantaCecilia/scripts/nav.js"></script>
    <script src="/Site-BandaSantaCecilia/scripts/header.js"></script>
</body>
</html>