<?php 
include "../../scripts/secure.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banda Santa Cecilia</title>
    <link rel="shortcut icon" href="/Site-BandaSantaCecilia/imagens/favicon.png" type="image/x-icon">
    
    <link rel="stylesheet" href="/Site-BandaSantaCecilia/estilos/style.css">
    <link rel="stylesheet" href="cadastrar.css">
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
                <h2>Cadastrar</h2>
                <button onclick="javascript:history.go(-1)"></button>

            </nav>
            <form action="cad.php" method="post">
                <div>
                    <label for="inome">Nome:</label>
                    <input type="text" name="nome" id="inome" required>
                </div>
                <div>
                    <label for="iemail">Email:</label>
                    <input type="email" name="email" id="iemail" required>
                </div>
                <div>
                    <label for="isenha">Senha:</label>
                    <input type="password" name="senha" id="isenha" required>
                </div>
                <div>
                    <label for="inasc">Nascimento:</label>
                    <input type="date" name="nasc" id="inasc" required>
                </div>
                <div>
                    <label for="inum">Whatsapp:</label>
                    <input type="number" name="num" id="inum" maxlength="11" placeholder="(**) * ****-****" required>
                </div>
                <div>
                    <label for="ifuncao">Função:</label>
                    <select name="instrumento" id="ifuncao">
                        <optgroup label='Instrumentos'>
                            <option value="Clarinete" required>Clarinete</option>
                            <option value="Flauta Transversal" required>Flauta Transversal</option>
                            <option value="Sax Soprano" required>Sax Soprano</option>
                            <option value="Sax Alto" required>Sax Alto</option>
                            <option value="Sax Tenor" required>Sax Tenor</option>
                            <option value="Sax Baritono" required>Sax Baritono</option>
                            <option value="Trompete" required>Trompete</option>
                            <option value="Bombardino" required>Bombardino</option>
                            <option value="Trompa" required>Trompa</option>
                            <option value="Trombone" required>Trombone</option>
                            <option value="Baixo Bb" required>Baixo Bb</option>
                            <option value="Baixo Eb" required>Baixo Eb</option>
                            <option value="Bateria" required>Bateria/Percusão</option>
                        </optgroup>
                        <optgroup label="Cargo">
                            <option value="Presidente" required>Presidente</option>
                            <option value="Diretor" required>Diretor</option>
                            <option value="Maestro" required>Maestro</option>
                            <option value="Professor" required>Professor</option>
                            <option value="Porta Bandeira" required>Porta Bandeira</option>
                        </optgroup>
                    </select>
                </div>
                <div class="option">
                    <input type="radio" name="funcao" id="ialuno" value="Aluno" required checked>
                    <label for="ialuno">Aluno</label>

                    <input type="radio" name="funcao" id="integrante" value="Integrante" required>
                    <label for="iintegrante">Integrante</label>
                    
                    <input type="radio" name="funcao" id="iadm" value="Administrador" required>
                    <label for="iadm">Adm</label>
                </div>
                <div>
                    <input type="submit" value="Cadastrar">
                    <input type="reset" value="Limpar">
                </div>
            </form>
        </article>
    </main>
    <script src="/Site-BandaSantaCecilia/scripts/nav.js"></script>
    <script src="/Site-BandaSantaCecilia/scripts/header.js"></script>
</body>
</html>