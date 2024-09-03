<?php 
include "../../../scripts/conexao.php";

$id = $_GET['id'];

$sql = "SELECT * FROM `agenda` WHERE `id` = $id";

$res = mysqli_query($conn,$sql);

while ($linha = mysqli_fetch_assoc($res)){
    $nome = $linha['evento'];
    $data = $linha['data'];
    $dia = $linha['dia'];
    $hora = $linha['hora'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banda Santa Cecilia</title>
    <link rel="stylesheet" href="/Site-BandaSantaCecilia/estilos/style.css">
    <link rel="stylesheet" href="update.css">
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