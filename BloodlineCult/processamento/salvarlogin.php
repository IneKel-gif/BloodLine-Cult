<?php

include "../app/cons.php";
require_once "../app/DLL.php";

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

$sql = "INSERT INTO logins (cpf, usuario, senha) VALUES ('$cpf','$usuario','$senha')";

banco($server, $user, $password, $db, $sql);

unset($_SESSION['cpf']);

header("location:../login.php");

exit;

?>