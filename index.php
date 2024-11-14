<?php
include 'funcoes.php';
if (isset($_COOKIE['usuarioLogado'])) {
    $usuario = htmlspecialchars($_COOKIE['usuarioLogado']);
} else {
    header("location:login.php");
    exit;
}
if (isset($_GET["excluir"])) {

    $index = $_GET['excluir'];
    excluirAmigo($index);
    header("location:index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tela principal</title>
</head>

<body>
    <header>
        <h1>Tela principal</h1>
    </header>
    <div id="topPage">
        <form
            method="POST" action="logout.php">
            <button id="sair" type="submit">sair</button>

        </form>
        <h1>bem-vindo, <?php echo "<b>" . $usuario . "</b>!"; ?></h1>
        <a id="cadastrar" href="agenCadastro.php">cadastrar</a>
    </div>
    <main>
    <img id="logo" src="https://t4.ftcdn.net/jpg/07/32/18/11/360_F_732181166_cUI5EJVXgsigMU9aEHIvS6nvnfV4wyol.jpg" alt="">
        <h2>nome - fone</h2>
        <section class="agenda">
            <?php listarAgenda() ?>
        </section>
    </main>


</body>

</html>
<style>
    #topPage{
        display: flex;
        justify-content: space-around
    }

    header {
        background-color: rgb(0, 0, 0);
        display: flex;
        justify-content: center;
        margin-bottom: 10px;
        color: white
    }

    #sair {
        justify-content: flex-start;

        font-size: 30px;
        margin-bottom: 50px;
        background-color: rgb(100, 100, 100);
        color: aliceblue;
        padding: 5px;
        border-radius: 30px;
        text-decoration: none;
    }



 

    li a {
        border-radius: 30px;
    
    }

    
 
        li {
        margin-bottom: 5px;
        padding: 10px;
display: flex;
justify-content: center;
align-items: center;
        color: white;
    }

    main {
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;

    }

    #cadastrar {
        float: right;
        font-size: 30px;
        background-color: rgb(100, 100, 100);
        color: aliceblue;
        padding: 5px;
        border-radius: 30px;
        text-decoration: none;

        margin-bottom: 50px;
    }

    ul {
        background-color: black;
        border-radius: 30px;
        padding: 10px;
        list-style: none;

    }

    b {

        color: #0400ff;
    }
    li img{
        margin-left: 10px;
        border: 3px solid white;
        border-radius: 100%;
        width: 30px;
        height  : 30px;
    }
    body {
        margin: 0;
        background-color: lightgray;
    }
    #logo {
        margin-bottom: 20px;
        border: 7px solid #252525;
        border-radius: 100%;
        width: 200px;
        height: 200px;
    }
</style>