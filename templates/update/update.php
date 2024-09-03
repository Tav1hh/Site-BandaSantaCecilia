<?php 
include "../../scripts/conexao.php";

$id = $_GET['id'];

$sql = "SELECT * FROM `integrantes` WHERE `id` = $id";

$res = mysqli_query($conn,$sql);

while ($linha = mysqli_fetch_assoc($res)){
    $aluno_musico = $linha['aluno_musico'];
    $nome = $linha['nome'];
    $nasc = $linha['data_nascimento'];
    $phone = $linha['telefone'];
    $instrumento = $linha['instrumento'];
}

// echo $res;

// Atualizar o Banco de Dados
// $sql = "UPDATE `integrantes` SET `nome`='[value-2]',`instrumento`='[value-3]',`data_nascimento`='[value-5]',`aluno_musico`='[value-6]',`telefone`='[value-7]' WHERE 1"

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
                    <label for="inasc">Nascimento:</label>
                    <input type="date" name="nasc" id="inasc" required value="<?=$nasc?>">
                </div>
                <div>
                    <label for="inum">Whatsapp:</label>
                    <input type="number" name="num" id="inum" maxlength="11" placeholder="(**) * ****-****" required value="<?=$phone?>">
                </div>
                <div class="option">
                    <div>
                        <input type="radio" name="instrumento" id="iclarinete" value="Clarineta" required <?php echo ($instrumento == "Clarineta") ? 'checked' : ''; ?>>
                        <label for="iclarinete">Clarinete</label> <br>
                
                        <input type="radio" name="instrumento" id="iflautatransversal" value="Flauta Transversal" required <?php echo ($instrumento == "Flauta Transversal") ? 'checked' : ''; ?>>
                        <label for="iflautatransversal">Flauta Transversal</label> <br>
                
                        <input type="radio" name="instrumento" id="isaxsoprano" value="Sax Soprano" required <?php echo ($instrumento == "Sax Soprano") ? 'checked' : ''; ?>>
                        <label for="isaxsoprano">Saxofone Soprano</label> <br>
                    </div> 
                    <div>
                        <input type="radio" name="instrumento" id="isaxalto" value="Sax Alto" required <?php echo ($instrumento == "Sax Alto") ? 'checked' : ''; ?>>
                        <label for="isaxalto">Saxofone Alto</label> <br>
                
                        <input type="radio" name="instrumento" id="isaxtenor" value="Sax Tenor" required <?php echo ($instrumento == "Sax Tenor") ? 'checked' : ''; ?>>
                        <label for="isaxtenor">Saxofone Tenor</label> <br>
                
                        <input type="radio" name="instrumento" id="isaxbaritono" value="Sax Baritono" required <?php echo ($instrumento == "Sax Baritono") ? 'checked' : ''; ?>>
                        <label for="isaxbaritono">Saxofone Baritono</label> <br>
                    </div>
                    <div>
                        <input type="radio" name="instrumento" id="itrompete" value="Trompete" required <?php echo ($instrumento == "Trompete") ? 'checked' : ''; ?>>
                        <label for="itrompete">Trompete</label> <br>
                
                        <input type="radio" name="instrumento" id="ibombardino" value="Bombardino" required <?php echo ($instrumento == "Bombardino") ? 'checked' : ''; ?>>
                        <label for="ibombardino">Bombardino</label> <br>
                
                        <input type="radio" name="instrumento" id="itrombone" value="Trombone" required <?php echo ($instrumento == "Trombone") ? 'checked' : ''; ?>>
                        <label for="itrombone">Trombone</label> <br>
                
                        <input type="radio" name="instrumento" id="ibaixo" value="Baixo" required <?php echo ($instrumento == "Baixo") ? 'checked' : ''; ?>>
                        <label for="ibaixo">Baixo</label>
                    </div>
                    <div>
                        <input type="radio" name="aluno_musico" id="ialuno" value="Aluno" required <?php echo ($aluno_musico == "Aluno") ? 'checked' : ''; ?>>
                        <label for="ialuno">Aluno</label>

                        <input type="radio" name="aluno_musico" id="imusico" value="Músico" required <?php echo ($aluno_musico == "Músico") ? 'checked' : ''; ?>>
                        <label for="imusico">Músico</label>
                    </div>
                </div>
                <div>
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