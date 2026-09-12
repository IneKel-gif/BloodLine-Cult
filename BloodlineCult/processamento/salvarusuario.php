<?php

include "../app/cons.php";
require_once "../app/DLL.php";

if (empty($_POST)) {
    header("location:../cadastro.php");
    exit;
}

session_start();

extract($_POST);

$_SESSION['cpf'] = $cpf;

$sql = "INSERT INTO usuarios (nome, cpf, cep, estado, cidade, bairro, endereco) VALUES ('$nome', '$cpf', '$cep', '$estado', '$cidade', '$bairro', '$endereco')";

banco($server, $user, $password, $db, $sql);

header("location:../cadastro2.php");

exit;