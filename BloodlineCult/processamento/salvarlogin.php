<?php

include "../app/cons.php";
require_once "../app/DLL.php";

if(!isset($_POST['usuario']) || !isset($_POST['senha']) || !isset($_POST['email'])){
    header("location:../cadastro2.php");
    exit;
}

session_start();

if(!isset($_SESSION['id_usuario']))
{
    header("location:../cadastro1.php");
    exit;
}

extract($_POST);

$senha = md5($senha);
$id_usuario = $_SESSION['id_usuario'];

$sql = "INSERT INTO logins (id_usuario, usuario, email, senha) VALUES ('$id_usuario','$usuario','$email','$senha')";

banco($server, $user, $password, $db, $sql);

unset($_SESSION['id_usuario']);

header("location:../login.php");

exit;

?>