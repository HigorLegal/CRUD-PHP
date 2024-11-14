<?php
include"funcoes.php";
if(isset($_GET['editar'])){
$index = $_GET['editar'];
$agenda =carregarAgendas();

if(isset($agenda[$index])){
$nomeAtual = $agenda[$index]["amigos"];
$foneAtual = $agenda[$index]["fones"];

}else{
    echo"amigos nao encontrado";
    exit;
}
}

//processa alteraçao de amigos
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["fones"])){
    $nomeAlterado = $_POST["amigos"];
    $foneAlterado = $_POST["fones"];
    alterarAgenda($index,$nomeAlterado,$foneAlterado);
    header("location:index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>alterar Agenda</title>
</head>
<body>
    <header>
        <h1>alterar Agenda</h1>
    </header>
    <a id="voltar" href="index.php">voltar</a>
    <main>
        <img src="https://static.vecteezy.com/ti/vetor-gratis/p1/376666-icone-de-de-gerenciamento-de-usuario-gratis-vetor.jpg" alt="">
<form method="POST">

<input type="text" name="amigos" id="amigos" value=<?php echo htmlspecialchars($nomeAtual);?> placeholder="amigos" require>  
<br>
<input type="text" name="fones" value=<?php echo htmlspecialchars($foneAtual);?> placeholder="fones" require>
<br> 
<button type="submit">alterar</button>
</form>
</main>
</body>

</html>
<style>
      body {
        margin: 0;
        background-color: lightgray;
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
     #voltar {
        justify-content: flex-start;
        font-size: 30px;
        margin-bottom: 50px;
        background-color: rgb(100, 100, 100);
        color: aliceblue;
        padding: 5px;
        border-radius: 30px;
        text-decoration: none;
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
    img{
        margin-bottom: 20px;
        border:10px solid black ;
        border-radius: 100%;
        width: 200px;
        height  : 200px;
    }</style>