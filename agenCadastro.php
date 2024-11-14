<?php

include "funcoes.php";
$contaUsada = "";


//processo de cadastro

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nome"]) && isset($_POST["telefone"])) {
    
    $amigo = $_POST["nome"];
    $fone = $_POST["telefone"];
    $agenda= carregarAgendas();
    $contalivre = true;

        salvarAgenda($amigo, $fone);
        header("location:index.php");
        
  
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
        <h1>Tela de Cadastro de amigo</h1>
    </header>
<a id="voltar" href="index.php">voltar</a>
    <main>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSE1celiaX-o-k4pxKqTtoCIvGYVil4ilQXqoqQ7SihOtZbHpYy34Jlmgrw7bJvww9hZE8&usqp=CAU" alt="">
        <form action="agenCadastro.php" method="POST">
              <?php echo $contaUsada;?>
            <input type="text" name="nome" id="nome" placeholder="nome" require>
            <br>
            <input type="text" name="telefone" id="telefone" placeholder="telefone" minlength="8" require>
            <br>
            <button type="submit">cadastrar</button>
        </form>
        
       

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
    img{
        margin-bottom: 20px;
        border:10px solid black ;
        border-radius: 100%;
        width: 200px;
        height  : 200px;
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




    body {
        margin: 0;
        background-color: lightgray;
    }
</style>