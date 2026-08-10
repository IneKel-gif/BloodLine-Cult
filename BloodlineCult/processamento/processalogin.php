<?php

if(!isset($_POST['usuario']) || !isset($_POST['senha']))
{
    header("location:../login.php");
    exit;
}

session_start();

extract($_POST);

$caminho = "../logins/".$usuario.".dat";

if(file_exists($caminho)){
    $arq = fopen($caminho, "r");

    $cpf = trim(fgets($arq));
    $usuariosalvo = trim(fgets($arq));
    $senhasalva = trim(fgets($arq));

    fclose($arq);

    if($usuario == $usuariosalvo && md5($senha) == $senhasalva){
        $_SESSION['usuario'] = $usuario;

        header("location:../inicio.php");
        exit;

    }

    else{
        header("location: errosenha.php");
        exit;
    }
}

else{
    header("location: errousuario.php");
    exit;
}

?>