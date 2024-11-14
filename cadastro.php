<?php

include "funcoes.php";
$contaUsada = "";


//processo de cadastro

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario"]) && isset($_POST["senha"])) {

    $novoUsu = $_POST["usuario"];
    $novaSenha = $_POST["senha"];
    $usuarios = carregarUsuarios();
    $contalivre = true;

    foreach ($usuarios as $user) {

        if ($novoUsu === $user["usuario"]) {
            $contalivre = false;
        }
    }
    if ($contalivre) {
        salvarUsu($novoUsu, $novaSenha);
        header("location:login.php");
    } else {
        $contaUsada = "esse nome de usuario ja existe ";
    }
}

//pocesso para a exclussao do usu
if (isset($_GET["excluir"])) {

    $index = $_GET['excluir'];
    excluirUsu($index);
    header("location:cadastro.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro de usuarios</title>
</head>

<body>
    <header>
        <h1>Tela de Cadastro de Usuario</h1>
    </header>
    <a id="voltar" href="login.php">voltar</a>
    <main>
        <section>
            <div>
                <form action="cadastro.php" method="POST">
                    <img id="logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSE1celiaX-o-k4pxKqTtoCIvGYVil4ilQXqoqQ7SihOtZbHpYy34Jlmgrw7bJvww9hZE8&usqp=CAU" alt="">
                    <?php echo $contaUsada; ?>
                    <input type="text" name="usuario" id="usuario" placeholder="usuario" require>
                    <br>
                    <input type="text" name="senha" id="senha" placeholder="senha" require>
                    <br>
                    <button type="submit">cadastrar</button>
                </form>
            </div>
            <div>
                <h1>usuarios cadastrados</h1>
                <?php listarUsus(); ?>
            </div>
        </section>
    </main>
</body>

</html>
<style>
    #voltar {
        justify-content: flex-start;
        font-size: 30px;
        background-color: rgb(100, 100, 100);
        color: aliceblue;
        padding: 5px;
        border-radius: 30px;
        text-decoration: none;

        margin-bottom: 50px;
    }

    h2 {
        color: white;
        text-align: center
    }

    header h1 {

        text-align: center
    }

    header {
        background-color: rgb(0, 0, 0);
        display: flex;
        justify-content: center;
        margin-bottom: 10px;
        color: white
    }

    button {
        padding: 10px;
        padding-left: 20px;
        padding-right: 20px;
        font-size: 20px;
        border-radius: 30px;
    }

    input {
        text-align: center;
        padding: 10px;
        font-size: 20px;
    }

    form {
        display: flex;
        flex-direction: column;

        align-items: center;
    }

    main {
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;

    }

    ul {
        background-color: black;
        border-radius: 30px;
        padding: 10px;
        list-style: none;

    }

    li #excluir {
        margin-left: 5px;

    }


    li {
        margin-bottom: 5px;
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
    }

    body {
        margin: 0;
        background-color: lightgray;
    }

    li img {
        margin-left: 10px;
        border: 3px solid white;
        border-radius: 100%;
        width: 30px;
        height: 30px;
    }

    #logo {
        margin-bottom: 20px;
        border: 10px solid black;
        border-radius: 100%;
        width: 200px;
        height: 200px;
    }

    section {
        display: flex;
        justify-content: center;
        gap: 200px;
    }
</style>