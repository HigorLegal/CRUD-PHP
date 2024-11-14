<?php
include "funcoes.php";
$contaUsada = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $usuarioValido = false;

    //carrega a lista de usuarios do arquivo
    $usuarios = carregarUsuarios();
    //verifica se o usuario e a senha estao no vetor de usuarios
    foreach ($usuarios as $user) {
        if ($user["usuario"] === $usuario && $user["senha"] === $senha) {
            $usuarioValido = true;
            break;
        }
    }
    if ($usuarioValido) {
        //define os cokies para o login por 5 min(300secs)
        setcookie("usuarioLogado", $usuario, time() + 300, "/");
        header("location:index.php");
        exit;
    } else {

        $contaUsada =  "usuario ou senha incorreta";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login de usuarios</title>
</head>

<body>
    <header>
        <h1>Tela de login de Usuario</h1>
    </header>

    <main>
        <img src="https://static.vecteezy.com/ti/vetor-gratis/t1/7033146-perfil-icone-login-head-icon-vetor.jpg" alt="">
      <?php echo $contaUsada ;?>
        <form action="#" method="POST">

            <input type="text" name="usuario" id="usuario" placeholder="coloque o usuario" require>
            <br>
            <input type="text" name="senha" id="senha" placeholder="coloque a senha" require>
            <br>
            <button type="submit">logar</button>
        </form>
        
        <a href="cadastro.php">cadastrar</a>
  
    </main>
</body>

</html>
<style>
    header {
        background-color: rgb(0, 0, 0);
        display: flex;
        justify-content: center;
        margin-bottom: 50px;
        color: white;

    }

    input {
        text-align: center;
        padding: 10px;
        font-size: 20px;
    }

    button {
        padding: 10px;
        padding-left: 20px;
        padding-right: 20px;
        font-size: 20px;
        border-radius: 30px;
    }

    form {
        display: flex;
        flex-direction: column;

        align-items: center;
    }

    main a {
        padding: 10px;
        padding-left: 20px;
        padding-right: 20px;
        font-size: 20px;
        margin-top: 10px;
        background-color: black;
        border-radius: 30px;
        color: white;
        text-decoration: none;
    }

    main {
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;

    }

    body {
        margin: 0;
        background-color: lightgray;
    }
    main img{
        margin-bottom: 20px;
        border-radius: 100%;
        height: 200px;
        width:  200px;
    }
</style>