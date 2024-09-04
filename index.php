<?php 
include_once 'scripts/conexao.php';
$erro = '';

if (!isset($_SESSION)) {
    session_start();
    if (isset($_SESSION['id'])) {
        header('location: templates/');
    }
}

if (isset($_POST['email']) & isset($_POST['senha'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "select * from integrantes where email='$email' and senha='$senha'";
    $res = mysqli_query($conn,$sql);
    $linha = mysqli_fetch_array($res);

    if (isset($linha['email']) and $linha['senha']) {
        if ($email == $linha['email'] and $senha == $linha['senha']) {
            // Coloca os dados na sessão
            $_SESSION['id'] = $linha['id'];
            $_SESSION['nome'] = $linha['nome'];
            $_SESSION['email'] = $linha['email'];
            $_SESSION['adm'] = $linha['funcao'];
            $_SESSION['instrumento'] = $linha['instrumento'];
            $_SESSION['classe'] = $linha['classe'];
            $_SESSION['data_matricula'] = $linha['data_matricula'];

            header('location: templates/');
        }
    } else {
        $erro = "Email ou Senha incorretos!";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="/Site-BandaSantaCecilia/imagens/favicon.png" type="image/x-icon">
    <style>
        @charset "UTF-8";

        *{
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        body{
            background-color: #333;
            padding: 10px;
        }

        header, footer{
            padding: 10px;
            color: white;
            text-align: center;
        }

        main{
            max-width: 300px;
            width: 100%;
            background-color: white;
            margin: auto;
            border-radius: 10px;
            padding: 10px;
            /* padding-bottom: 0px; */
        }

        main form{
            background-color: #ccc;
            border-radius: 10px;
            padding: 10px;
        }

        form input{
            outline: none;
            width: 100%;
            padding: 5px;
            height: 40px;
            border-radius: 5px;
            border: 1px solid black;
        }

        form .btns{
            display: flex;
            margin-top: 5px;
            gap: 10px;
        }

        form .btns input{
            cursor: pointer;
            color: white;
            background-color: #333;
            transition: color .5s, background-color .5s;
        }

        .btns input:hover{
            background-color: #858585;
            color: #333;
            border: 1px solid #333;
        }
        main >p {
            margin: 1px 0px;
            border-radius: 10px;
            color: black;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
    <main>
        <form action="#" method="post">
            <div>
                <label for="iemail">Email:</label>
                <input type="email" name="email" id="iemail" required>
            </div>

            <div>
                <label for="isenha">Senha:</label>
                <input type="password" name="senha" id="isenha" required>
            </div>
            <div class="btns">
                <input type="submit" value="Logar">
                <input type="reset" value="Limpar">
            </div>
        </form>
        <p><?=$erro?></p>
    </main>
    <footer>
        <p>Site Criado por &copy;2024 Otávio Santiago</p>
    </footer>
</body>
</html>