<?php 
include "../../../scripts/secure.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banda Santa Cecilia</title>
    <link rel="shortcut icon" href="/Site-BandaSantaCecilia/imagens/favicon.png" type="image/x-icon">
    
    <link rel="stylesheet" href="/Site-BandaSantaCecilia/estilos/style.css">
    <link rel="stylesheet" href="enviar.css">
    <script src="app.js" defer></script>
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
                <h2>Enviar</h2>
                <button onclick="javascript:history.go(-1)"></button>

            </nav>
            <form action="env.php" method="post" enctype="multipart/form-data"0>
            <div class="name">
                <label for="inome">Nome da Música:</label>
                <input type="text" name="nome" id="inome" required>
            </div>
            <section>
                    <h3>1º Primeiros</h3>
                    <div>
                        <label for="iclarinete1" id="iclarinete-1" >Clarinete</label>
                        <input type="file" onchange="arq('iclarinete-1')" name="clarinete1" id="iclarinete1">
                    </div>
                    <div>
                        <label for="iflautatransversal1" id="iflautatransversal-1" >F.Transversal</label>
                        <input type="file" onchange="arq('iflautatransversal-1')" name="flautatransversal1" id="iflautatransversal1">
                    </div>
                    <div>
                        <label for="itrompete1" id="itrompete-1" >Trompete</label>
                        <input type="file" onchange="arq('itrompete-1')" name="trompete1" id="itrompete1">
                    </div>
                    <div>
                        <label for="isaxsoprano1" id="isaxsoprano-1" >Sax Soprano</label>
                        <input type="file" onchange="arq('isaxsoprano-1')" name="saxsoprano1" id="isaxsoprano1">
                    </div>
                    <div>
                        <label for="isaxalto1" id="isaxalto-1" >Sax Alto</label>
                        <input type="file" onchange="arq('isaxalto-1')" name="saxalto1" id="isaxalto1">
                    </div>
                    <div>
                        <label for="isaxtenor1" id="isaxtenor-1" >Sax Tenor</label>
                        <input type="file" onchange="arq('isaxtenor-1')" name="saxtenor1" id="isaxtenor1">
                    </div>
                    <div>
                        <label for="isaxbaritono1" id="isaxbaritono-1" >Sax baritono</label>
                        <input type="file" onchange="arq('isaxbaritono-1')" name="saxbaritono1" id="isaxbaritono1">
                    </div>
                    <div>
                        <label for="ibombardino1" id="ibombardino-1" >Bombardino</label>
                        <input type="file" onchange="arq('ibombardino-1')" name="bombardino1" id="ibombardino1">
                    </div>
                    <div>
                        <label for="itrompa1" id="itrompa-1" >Trompa</label>
                        <input type="file" onchange="arq('itrompa-1')" name="trompa1" id="itrompa1">
                    </div>
                    <div>
                        <label for="itrombone1" id="itrombone-1" >Trombone</label>
                        <input type="file" onchange="arq('itrombone-1')" name="trombone1" id="itrombone1">
                    </div>
                    <div>
                        <label for="ibaixoeb1" id="ibaixoeb-1" >Baixo Eb</label>
                        <input type="file" onchange="arq('ibaixoeb-1')" name="baixoeb1" id="ibaixoeb1">
                    </div>
                    <div>
                        <label for="ibaixobb1" id="ibaixobb-1" >Baixo Bb</label>
                        <input type="file" onchange="arq('ibaixobb-1')" name="baixobb1" id="ibaixobb1">
                    </div>
                </section>
                <section>
                    <h3>2º Segundos</h3>
                    <div>
                        <label for="iclarinete2" id="iclarinete-2" >Clarinete</label>
                        <input type="file" onchange="arq('iclarinete-2')" name="clarinete2" id="iclarinete2">
                    </div>
                    <div>
                        <label for="iflautatransversal2" id="iflautatransversal-2" >F.Transversal</label>
                        <input type="file" onchange="arq('iflautatransversal-2')" name="flautatransversal2" id="iflautatransversal2">
                    </div>
                    <div>
                        <label for="itrompete2" id="itrompete-2" >Trompete</label>
                        <input type="file" onchange="arq('itrompete-2')" name="trompete2" id="itrompete2">
                    </div>
                    <div>
                        <label for="isaxsoprano2" id="isaxsoprano-2" >Sax Soprano</label>
                        <input type="file" onchange="arq('isaxsoprano-2')" name="saxsoprano2" id="isaxsoprano2">
                    </div>
                    <div>
                        <label for="isaxalto2" id="isaxalto-2" >Sax Alto</label>
                        <input type="file" onchange="arq('isaxalto-2')" name="saxalto2" id="isaxalto2">
                    </div>
                    <div>
                        <label for="isaxtenor2" id="isaxtenor-2" >Sax Tenor</label>
                        <input type="file" onchange="arq('isaxtenor-2')" name="saxtenor2" id="isaxtenor2">
                    </div>
                    <div>
                        <label for="isaxbaritono2" id="isaxbaritono-2" >Sax baritono</label>
                        <input type="file" onchange="arq('isaxbaritono-2')" name="saxbaritono2" id="isaxbaritono2">
                    </div>
                    <div>
                        <label for="ibombardino2" id="ibombardino-2" >Bombardino</label>
                        <input type="file" onchange="arq('ibombardino-2')" name="bombardino2" id="ibombardino2">
                    </div>
                    <div>
                        <label for="itrompa2" id="itrompa-2" >Trompa</label>
                        <input type="file" onchange="arq('itrompa-2')" name="trompa2" id="itrompa2">
                    </div>
                    <div>
                        <label for="itrombone2" id="itrombone-2" >Trombone</label>
                        <input type="file" onchange="arq('itrombone-2')" name="trombone2" id="itrombone2">
                    </div>
                    <div>
                        <label for="ibaixoeb2" id="ibaixoeb-2" >Baixo Eb</label>
                        <input type="file" onchange="arq('ibaixoeb-2')" name="baixoeb2" id="ibaixoeb2">
                    </div>
                    <div>
                        <label for="ibaixobb2" id="ibaixobb-2" >Baixo Bb</label>
                        <input type="file" onchange="arq('ibaixobb-2')" name="baixobb2" id="ibaixobb2">
                    </div>
                </section>
                <section>
                    <h3>3º Terceiros</h3>
                    <div>
                        <label for="iclarinete3" id="iclarinete-3" >Clarinete</label>
                        <input type="file" onchange="arq('iclarinete-3')" name="clarinete3" id="iclarinete3">
                    </div>
                    <div>
                        <label for="iflautatransversal3" id="iflautatransversal-3" >F.Transversal</label>
                        <input type="file" onchange="arq('iflautatransversal-3')" name="flautatransversal3" id="iflautatransversal3">
                    </div>
                    <div>
                        <label for="itrompete3" id="itrompete-3" >Trompete</label>
                        <input type="file" onchange="arq('itrompete-3')" name="trompete3" id="itrompete3">
                    </div>
                    <div>
                        <label for="isaxsoprano3" id="isaxsoprano-3" >Sax Soprano</label>
                        <input type="file" onchange="arq('isaxsoprano-3')" name="saxsoprano3" id="isaxsoprano3">
                    </div>
                    <div>
                        <label for="isaxalto3" id="isaxalto-3" >Sax Alto</label>
                        <input type="file" onchange="arq('isaxalto-3')" name="saxalto3" id="isaxalto3">
                    </div>
                    <div>
                        <label for="isaxtenor3" id="isaxtenor-3" >Sax Tenor</label>
                        <input type="file" onchange="arq('isaxtenor-3')" name="saxtenor3" id="isaxtenor3">
                    </div>
                    <div>
                        <label for="isaxbaritono3" id="isaxbaritono-3" >Sax baritono</label>
                        <input type="file" onchange="arq('isaxbaritono-3')" name="saxbaritono3" id="isaxbaritono3">
                    </div>
                    <div>
                        <label for="ibombardino3" id="ibombardino-3" >Bombardino</label>
                        <input type="file" onchange="arq('ibombardino-3')" name="bombardino3" id="ibombardino3">
                    </div>
                    <div>
                        <label for="itrompa3" id="itrompa-3" >Trompa</label>
                        <input type="file" onchange="arq('itrompa-3')" name="trompa3" id="itrompa3">
                    </div>
                    <div>
                        <label for="itrombone3" id="itrombone-3" >Trombone</label>
                        <input type="file" onchange="arq('itrombone-3')" name="trombone3" id="itrombone3">
                    </div>
                    <div>
                        <label for="ibaixoeb3" id="ibaixoeb-3" >Baixo Eb</label>
                        <input type="file" onchange="arq('ibaixoeb-3')" name="baixoeb3" id="ibaixoeb3">
                    </div>
                    <div>
                        <label for="ibaixobb3" id="ibaixobb-3" >Baixo Bb</label>
                        <input type="file" onchange="arq('ibaixobb-3')" name="baixobb3" id="ibaixobb3">
                    </div>
                </section>
                <section>
                    <h3>4º Quartos</h3>
                    <div>
                        <label for="iclarinete4" id="iclarinete-4" >Clarinete</label>
                        <input type="file" onchange="arq('iclarinete-4')" name="clarinete4" id="iclarinete4">
                    </div>
                    <div>
                        <label for="iflautatransversal4" id="iflautatransversal-4" >F.Transversal</label>
                        <input type="file" onchange="arq('iflautatransversal-4')" name="flautatransversal4" id="iflautatransversal4">
                    </div>
                    <div>
                        <label for="itrompete4" id="itrompete-4" >Trompete</label>
                        <input type="file" onchange="arq('itrompete-4')" name="trompete4" id="itrompete4">
                    </div>
                    <div>
                        <label for="isaxsoprano4" id="isaxsoprano-4" >Sax Soprano</label>
                        <input type="file" onchange="arq('isaxsoprano-4')" name="saxsoprano4" id="isaxsoprano4">
                    </div>
                    <div>
                        <label for="isaxalto4" id="isaxalto-4" >Sax Alto</label>
                        <input type="file" onchange="arq('isaxalto-4')" name="saxalto4" id="isaxalto4">
                    </div>
                    <div>
                        <label for="isaxtenor4" id="isaxtenor-4" >Sax Tenor</label>
                        <input type="file" onchange="arq('isaxtenor-4')" name="saxtenor4" id="isaxtenor4">
                    </div>
                    <div>
                        <label for="isaxbaritono4" id="isaxbaritono-4" >Sax baritono</label>
                        <input type="file" onchange="arq('isaxbaritono-4')" name="saxbaritono4" id="isaxbaritono4">
                    </div>
                    <div>
                        <label for="ibombardino4" id="ibombardino-4" >Bombardino</label>
                        <input type="file" onchange="arq('ibombardino-4')" name="bombardino4" id="ibombardino4">
                    </div>
                    <div>
                        <label for="itrompa4" id="itrompa-4" >Trompa</label>
                        <input type="file" onchange="arq('itrompa-4')" name="trompa4" id="itrompa4">
                    </div>
                    <div>
                        <label for="itrombone4" id="itrombone-4" >Trombone</label>
                        <input type="file" onchange="arq('itrombone-4')" name="trombone4" id="itrombone4">
                    </div>
                    <div>
                        <label for="ibaixoeb4" id="ibaixoeb-4" >Baixo Eb</label>
                        <input type="file" onchange="arq('ibaixoeb-4')" name="baixoeb4" id="ibaixoeb4">
                    </div>
                    <div>
                        <label for="ibaixobb4" id="ibaixobb-4" >Baixo Bb</label>
                        <input type="file" onchange="arq('ibaixobb-4')" name="baixobb4" id="ibaixobb4">
                    </div>
                </section>
                <div class="btns">
                    <input type="submit" name="salvar" value="Enviar">
                    <!-- <input type="reset" onclick="javascript:document.location.href= document.location.href" value="Limpar"> -->
                </div>
            </form>
        </article>
    </main>
    <script>
        function arq(id) {
        var label = document.getElementById(id)

        if (this.files.length > 0) {
            label.classList.add('file-selected');
        } else {
            label.classList.remove('file-selected');
        }
    }
    </script>
    <script src="/Site-BandaSantaCecilia/scripts/nav.js"></script>
    <script src="/Site-BandaSantaCecilia/scripts/header.js"></script>
</body>
</html>