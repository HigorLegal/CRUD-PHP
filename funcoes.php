<?php
//caregar usuarios do arquivo
function carregarAgendas()
{
    
    $agendas = [];
    
    if (file_exists('agenda.TXT')) {
        
        $dados = file('agenda.TXT', FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
       
        foreach ($dados as $linha) {
            list($amigos,$fones) = explode(" : ", $linha);
            $agendas[] = [ "amigos" => $amigos, "fones" =>$fones];
        }
    }
    return $agendas;
}
function salvarAgenda($amigos,$fones)
{
    $linha =  $amigos ." : ". $fones. PHP_EOL;
    file_put_contents("agenda.TXT", $linha, FILE_APPEND);
}


//listar usuarios cadastrados
function listarAgenda()
{
    $agendas = carregarAgendas();
    echo "<ul>";
    foreach ($agendas as $index => $ag) {
        echo "<li>".htmlSpecialchars($ag["amigos"] ." - ".$ag["fones"]). "<a id='excluir' href='index.php?excluir=".$index."'><img id='imgAlt' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcx1AupvWZqkA2_GijfJIDCsc1xCNXVNOkDQ&s' alt=''> </a>".
            "<a id='alterar' href='agenAlt.php?editar=".$index."'><img id='imgAlt' src='https://cdn.pixabay.com/photo/2017/06/06/00/33/edit-icon-2375785_640.png' alt=''></a></li>";
    }
    echo "</ul>";
}




function alterarAgenda($index, $novoNome, $novoFone)
{
    $agendas = carregarAgendas();

    if (isset($agendas[$index])) {

        //trica o usuario e a senha pelos novos 
        $agendas[$index] = ["amigos" => $novoNome, "fones" => $novoFone];
file_put_contents("agenda.TXT", "");
//salva denovo nao sei
        foreach ($agendas as $ag) {
            salvarAgenda($ag["amigos"], $ag["fones"]);   
        }
    }
}
function excluirAmigo($index)
{
    $agendas = carregarAgendas();
    if (isset($agendas[$index])) {

        unset($agendas[$index]);
        file_put_contents("agenda.TXT", "");

        foreach ($agendas as $ag) {
            salvarAgenda($ag["amigos"], $ag["fones"]);
        }
    }
}





// para baixo sao as funçoes do usuario







function carregarUsuarios()
{

    $usuarios = [];

    if (file_exists('usuarios.TXT')) {

        $dados = file('usuarios.TXT', FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);

        foreach ($dados as $linha) {
            list($usuario, $senha) = explode(" : ", $linha);
            $usuarios[] = ["usuario" => $usuario, "senha" => $senha];
        }
    }
    return $usuarios;
}



//salvar um novo usuario no arquivo
function salvarUsu($usuario, $senha)
{
    $linha = $usuario . " : " . $senha . PHP_EOL;
    file_put_contents("usuarios.TXT", $linha, FILE_APPEND);
}
//listar usuarios cadastrados
function listarUsus()
{
    $usuarios = carregarUsuarios();
    echo "<ul>";
    foreach ($usuarios as $index => $user) {
        echo "<li>".htmlSpecialchars($user["usuario"]) . "<a id='excluir' href='cadastro.php?excluir=".$index."'>  <img id='imgAlt' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcx1AupvWZqkA2_GijfJIDCsc1xCNXVNOkDQ&s' alt=''> </a>".
            "<a id='alterar' href='alterar.php?editar=".$index."'><img id='imgAlt' src='https://cdn.pixabay.com/photo/2017/06/06/00/33/edit-icon-2375785_640.png' alt=''></a></li>";
    }
    echo "</ul>";
}

//excluir usuario
function excluirUsu($index)
{
    $usuarios = carregarUsuarios();
    if (isset($usuarios[$index])) {

        unset($usuarios[$index]);
        file_put_contents("usuarios.TXT", "");

        foreach ($usuarios as $user) {
            salvarUsu($user["usuario"], $user["senha"]);
        }
    }
}

//alterar usuario
function alterarusu($index, $novoUsu, $novaSenha)
{
    $usuarios = carregarUsuarios();

    if (isset($usuarios[$index])) {

        //trica o usuario e a senha pelos novos 
        $usuarios[$index] = ["usuario" => $novoUsu, "senha" => $novaSenha];
//salva no arquivo dos usus
        file_put_contents("usuarios.TXT", "");
//salva denovo nao sei
        foreach ($usuarios as $user) {
            salvarUsu($user["usuario"], $user["senha"]);
        }
    }
}
