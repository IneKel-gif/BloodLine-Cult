<?php

include "../app/cons.php";
require_once "../app/DLL.php";

if (empty($_POST)) {
    header("location:../cadastro.php");
    exit;
}

session_start();

extract($_POST);

$sql = "INSERT INTO usuarios (nome, cpf, cep, estado, cidade, bairro, endereco) VALUES ('$nome', '$cpf', '$cep', '$estado', '$cidade', '$bairro', '$endereco')";

banco($server, $user, $password, $db, $sql);

$sql = "SELECT id_usuario FROM usuarios WHERE cpf = '$cpf'";

$result = banco($server, $user, $password, $db, $sql);

$linha = $result->fetch_assoc();

$_SESSION['id_usuario'] = $linha['id_usuario'];

header("location:../cadastro2.php");

exit;