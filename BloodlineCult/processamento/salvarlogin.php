<?php

if(!isset($_POST['usuario']) || !isset($_POST['senha'])){
    header("location:../cadastro2.php");
    exit;
}

session_start();

if(!isset($_SESSION['cpf']))
{
    header("location:../cadastro1.php");
    exit;
}

extract($_POST);

$senha = md5($senha);
$cpf = $_SESSION['cpf'];

$arq = fopen("../logins/".$usuario.".dat", "w");

fwrite($arq, $cpf."\n");
fwrite($arq, $usuario."\n");
fwrite($arq, $senha);

fclose($arq);

unset($_SESSION['cpf']);

header("location:../login.php");

exit;

?>