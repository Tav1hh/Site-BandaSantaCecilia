<?php 
include "../../../scripts/conexao.php";
include "../../../scripts/secure.php";
function move($arq,$instrumento) {
    include "../../../scripts/conexao.php";
    // Verifica se o arquivo foi enviado e é um arquivo temporário
    if ($arq && isset($arq['tmp_name']) && is_uploaded_file($arq['tmp_name'])) {
        // Obtém o nome do diretório a partir do campo 'nome' no formulário ou usa um valor padrão
        $nome = isset($_POST['nome']) ? $_POST['nome'] : 'Nenhuma Partitura';
        
        // Cria o caminho completo para o diretório de destino
        $diretorioDestino = '../../../Partituras/' . $nome;
        
        // Garante que o diretório de destino existe
        if (!is_dir($diretorioDestino)) {
            mkdir($diretorioDestino, 0755, true);
        }
        
        // Move o arquivo para o diretório de destino
        $caminhoDestino = $diretorioDestino . '/' . $arq['name'];
        if(move_uploaded_file($arq['tmp_name'], $caminhoDestino)) {
            $query = "SELECT id FROM acervo_musical WHERE nome='$nome'";
            if ($linha = mysqli_query($conn, $query)) {
                $id = mysqli_fetch_column($linha);
                $sql = "INSERT INTO partituras(idmusica, instrumento, path) VALUES('$id','$instrumento','/Site-BandaSantaCecilia/Partituras/$nome/".$arq['name']."')";
                mysqli_query($conn,$sql);
                // echo $sql;

            }

        };
    }
}


// Salva o Nome da Música no Banco de Dados
$nome = isset($_POST['nome']) ? $_POST['nome'] : 'Nenhuma Partitura';
if ($nome != ' ') {
    $query = "select id from acervo_musical where nome='$nome'";

    $linha = mysqli_query($conn,$query);
    if (!mysqli_fetch_column($linha)) {
        $sql = "INSERT INTO acervo_musical(nome) values('$nome')";
        mysqli_query($conn,$sql);
    }
};

// 1º Primeiros
move($clarinete1 = isset($_FILES['clarinete1']) ? $_FILES['clarinete1'] : null, "Clarinete 1");
move($flautaTransversal1 = isset($_FILES['flautatransversal1']) ? $_FILES['flautatransversal1'] : null, "Flauta Transversal 1");
move($trompete1 = isset($_FILES['trompete1']) ? $_FILES['trompete1'] : null, "Trompete 1");
move($saxSoprano1 = isset($_FILES['saxsoprano1']) ? $_FILES['saxsoprano1'] : null, "Sax Soprano 1");
move($saxAlto1 = isset($_FILES['saxalto1']) ? $_FILES['saxalto1'] : null, "Sax Alto 1");
move($saxTenor1 = isset($_FILES['saxtenor1']) ? $_FILES['saxtenor1'] : null, "Sax Tenor 1");
move($saxBaritono1 = isset($_FILES['saxbaritono1']) ? $_FILES['saxbaritono1'] : null, "Sax Baritono 1");
move($bombardino1 = isset($_FILES['bombardino1']) ? $_FILES['bombardino1'] : null, "Bombardino 1");
move($trompa1 = isset($_FILES['trompa1']) ? $_FILES['trompa1'] : null, "Trompa 1");
move($trombone1 = isset($_FILES['trombone1']) ? $_FILES['trombone1'] : null, "Trombone 1");
move($baixoEb1 = isset($_FILES['baixoeb1']) ? $_FILES['baixoeb1'] : null, "Baixo Eb 1");
move($baixoBb1 = isset($_FILES['baixobb1']) ? $_FILES['baixobb1'] : null, "Baixo Bb 1");

// 2º Segundos
move($clarinete2 = isset($_FILES['clarinete2']) ? $_FILES['clarinete2'] : null, "Clarinete 2");
move($flautaTransversa2 = isset($_FILES['flautatransversal2']) ? $_FILES['flautatransversal2'] : null, "Flauta Transversal 2");
move($trompete2 = isset($_FILES['trompete2']) ? $_FILES['trompete2'] : null, "Trompete 2");
move($saxSoprano2 = isset($_FILES['saxsoprano2']) ? $_FILES['saxsoprano2'] : null, "Sax Soprano 2");
move($saxAlto2 = isset($_FILES['saxalto2']) ? $_FILES['saxalto2'] : null, "Sax Alto 2");
move($saxTenor2 = isset($_FILES['saxtenor2']) ? $_FILES['saxtenor2'] : null, "Sax Tenor 2");
move($saxBaritono2 = isset($_FILES['saxbaritono2']) ? $_FILES['saxbaritono2'] : null, "Sax Baritono 2");
move($bombardino2 = isset($_FILES['bombardino2']) ? $_FILES['bombardino2'] : null, "Bombardino 2");
move($trompa2 = isset($_FILES['trompa2']) ? $_FILES['trompa2'] : null, "Trompa 2");
move($trombone2 = isset($_FILES['trombone2']) ? $_FILES['trombone2'] : null, "Trombone 2");
move($baixoEb2 = isset($_FILES['baixoeb2']) ? $_FILES['baixoeb2'] : null, "Baixo Eb 2");
move($baixoBb2 = isset($_FILES['baixobb2']) ? $_FILES['baixobb2'] : null, "Baixo Bb 2");

// 3º Terceiros
move($clarinete3 = isset($_FILES['clarinete3']) ? $_FILES['clarinete3'] : null, "Clarinete 3");
move($flautaTransversal3 = isset($_FILES['flautatransversal3']) ? $_FILES['flautatransversal3'] : null, "Flauta Transversal 3");
move($trompete3 = isset($_FILES['trompete3']) ? $_FILES['trompete3'] : null, "Trompete 3");
move($saxSoprano3 = isset($_FILES['saxsoprano3']) ? $_FILES['saxsoprano3'] : null, "Sax Soprano 3");
move($saxAlto3 = isset($_FILES['saxalto3']) ? $_FILES['saxalto3'] : null, "Sax Alto 3");
move($saxTenor3 = isset($_FILES['saxtenor3']) ? $_FILES['saxtenor3'] : null, "Sax Tenor 3");
move($saxBaritono3 = isset($_FILES['saxbaritono3']) ? $_FILES['saxbaritono3'] : null, "Sax Baritono 3");
move($bombardino3 = isset($_FILES['bombardino3']) ? $_FILES['bombardino3'] : null, "Bombardino 3");
move($trompa3 = isset($_FILES['trompa3']) ? $_FILES['trompa3'] : null, "Trompa 3");
move($trombone3 = isset($_FILES['trombone3']) ? $_FILES['trombone3'] : null, "Trombone 3");
move($baixoEb3 = isset($_FILES['baixoeb3']) ? $_FILES['baixoeb3'] : null, "Baixo Eb 3");
move($baixoBb3 = isset($_FILES['baixobb3']) ? $_FILES['baixobb3'] : null, "Baixo Bb 3");

// 4º Quartos
move($clarinete4 = isset($_FILES['clarinete4']) ? $_FILES['clarinete4'] : null, "Clarinete 4");
move($flautaTransversal4 = isset($_FILES['flautatransversal4']) ? $_FILES['flautatransversal4'] : null, "Flauta Transversal 4");
move($trompete4 = isset($_FILES['trompete4']) ? $_FILES['trompete4'] : null, "Trompete 4");
move($saxSoprano4 = isset($_FILES['saxsoprano4']) ? $_FILES['saxsoprano4'] : null, "Sax Soprano 4");
move($saxAlto4 = isset($_FILES['saxalto4']) ? $_FILES['saxalto4'] : null, "Sax Alto 4");
move($saxTenor4 = isset($_FILES['saxtenor4']) ? $_FILES['saxtenor4'] : null, "Sax Tenor 4");
move($saxBaritono4 = isset($_FILES['saxbaritono4']) ? $_FILES['saxbaritono4'] : null, "Sax Baritono 4");
move($bombardino4 = isset($_FILES['bombardino4']) ? $_FILES['bombardino4'] : null, "Bombardino 4");
move($trompa4 = isset($_FILES['trompa4']) ? $_FILES['trompa4'] : null, "Trompa 4");
move($trombone4 = isset($_FILES['trombone4']) ? $_FILES['trombone4'] : null, "Trombone 4");
move($baixoEb4 = isset($_FILES['baixoeb4']) ? $_FILES['baixoeb4'] : null, "Baixo Eb 4");
move($baixoBb4 = isset($_FILES['baixobb4']) ? $_FILES['baixobb4'] : null, "Baixo Bb 4");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="env.css">
    <title>Partitura</title>
    <link rel="shortcut icon" href="/Site-BandaSantaCecilia/imagens/favicon.png" type="image/x-icon">
    
</head>
<body>
    <header>
        <h1>Cadastro de Partitura</h1>
    </header>
    <main>
        <?php 
        // mysqli_query($conn,$sql)
        ?>
            <p><?=$nome?> Salvo(a)!</p>
        <button onclick="javascript:window.location.href='/Site-BandaSantaCecilia/'">Voltar</button>
    </main>
</body>
</html>