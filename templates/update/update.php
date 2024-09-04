<?php 
include "../../scripts/conexao.php";
include "../../scripts/secure.php";

$id = $_GET['id'];

$sql = "SELECT * FROM `integrantes` WHERE `id` = $id";

$res = mysqli_query($conn,$sql);

while ($linha = mysqli_fetch_assoc($res)){
    $funcao = $linha['funcao'];
    $nome = $linha['nome'];
    $email = $linha['email'];
    $senha = $linha['senha'];
    $nasc = $linha['data_nascimento'];
    $phone = $linha['telefone'];
    $instrumento = $linha['instrumento'];
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
                    <label for="iemail">Email:</label>
                    <input type="email" name="email" id="iemail" required value="<?=$email?>">
                </div>
                <div>
                    <label for="isenha">Senha:</label>
                    <input type="password" name="senha" id="isenha" required value="<?=$senha?>">
                </div>
                <div>
                    <label for="inasc">Nascimento:</label>
                    <input type="date" name="nasc" id="inasc" required value="<?=$nasc?>">
                </div>
                <div>
                    <label for="inum">Whatsapp:</label>
                    <input type="number" name="num" id="inum" maxlength="11" placeholder="(**) * ****-****" required value="<?=$phone?>">
                </div>
                <div>
                    <label for="ifuncao">Função:</label>
                    <select name="instrumento" id="ifuncao">
                        <optgroup label="Instrumentos">
                            <option value="Clarinete" required <?php echo ($instrumento == "Clarinete") ? 'selected' : ''; ?>>Clarinete</option>
                            <option value="Flauta Transversal" required <?php echo ($instrumento == "Flauta Transversal") ? 'selected' : ''; ?>>Flauta Transversal</option>
                            <option value="Sax Soprano" required <?php echo ($instrumento == "Sax Soprano") ? 'selected' : ''; ?>>Sax Soprano</option>
                            <option value="Sax Alto" required <?php echo ($instrumento == "Sax Alto") ? 'selected' : ''; ?>>Sax Alto</option>
                            <option value="Sax Tenor" required <?php echo ($instrumento == "Sax Tenor") ? 'selected' : ''; ?>>Sax Tenor</option>
                            <option value="Sax Baritono" required <?php echo ($instrumento == "Sax Baritono") ? 'selected' : ''; ?>>Sax Baritono</option>
                            <option value="Trompete" required <?php echo ($instrumento == "Trompete") ? 'selected' : ''; ?>>Trompete</option>
                            <option value="Bombardino" required <?php echo ($instrumento == "Bombardino") ? 'selected' : ''; ?>>Bombardino</option>
                            <option value="Trompa" required <?php echo ($instrumento == "Trompa") ? 'selected' : ''; ?>>Trompa</option>
                            <option value="Trombone" required <?php echo ($instrumento == "Trombone") ? 'selected' : ''; ?>>Trombone</option>
                            <option value="Baixo Bb" required <?php echo ($instrumento == "Baixo Bb") ? 'selected' : ''; ?>>Baixo Bb</option>
                            <option value="Baixo Eb" required <?php echo ($instrumento == "Baixo Eb") ? 'selected' : ''; ?>>Baixo Eb</option>
                        </optgroup>
                        <optgroup label="Cargo">
                            <option value="Presidente" required  <?php echo ($instrumento == "Presidente") ? 'selected' : ''; ?>>Presidente</option>
                            <option value="Diretor" required  <?php echo ($instrumento == "Diretor") ? 'selected' : ''; ?>>Diretor</option>
                            <option value="Maestro" required  <?php echo ($instrumento == "Maestro") ? 'selected' : ''; ?>>Maestro</option>
                            <option value="Professor" required  <?php echo ($instrumento == "Professor") ? 'selected' : ''; ?>>Professor</option>
                            <option value="Porta Bandeira" required  <?php echo ($instrumento == "Porta Bandeira") ? 'selected' : ''; ?>>Porta Bandeira</option>
                        </optgroup>
                    </select>
                </div>
                <div class="option">
                    <input type="radio" name="funcao" id="ialuno" value="Aluno" required <?php echo ($funcao == "Aluno") ? 'checked' : ''; ?>>
                    <label for="ialuno">Aluno</label>

                    <input type="radio" name="funcao" id="integrante" value="Integrante" required <?php echo ($funcao == "Integrante") ? 'checked' : ''; ?>>
                    <label for="iintegrante">Integrante</label>
                    
                    <input type="radio" name="funcao" id="iadm" value="Administrador" required <?php echo ($funcao == "Administrador") ? 'checked' : ''; ?>>
                    <label for="iadm">Adm</label>
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