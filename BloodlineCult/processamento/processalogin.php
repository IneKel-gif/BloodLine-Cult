<?php

include "../app/cons.php";
require_once "../app/DLL.php";

if(!isset($_POST['usuario']) || !isset($_POST['senha']))
{
    header("location:../login.php");
    exit;
}

session_start();

extract($_POST);
$senha = md5($senha);

$consulta = "SELECT * FROM logins WHERE usuario = '$usuario'";
$resultado = banco($server, $user, $password, $db, $consulta);
$linha = $resultado -> fetch_assoc();

if ($linha) {
    $id_usuario = $linha['id_usuario'];
    $usuario_salvo = $linha['usuario'];
    $senha_salva = $linha['senha'];

    if ($usuario == $usuario_salvo && $senha == $senha_salva){
        $_SESSION['usuario'] = $usuario;
        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['tipo'] = $linha['tipo'];

        if ($linha['tipo'] == 'admin'){
            header("location:../admin.php");
            exit;
        }
        else{
            header("location:../inicio.php");
            exit;
        }
    }
    else{
        header("location: errosenha.php");
        exit;
    }
}
else {
    header("location: errousuario.php");
    exit;
}

?>