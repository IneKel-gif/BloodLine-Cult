<?php

if (empty($_POST)) {
    header("location:../cadastro1.php");
    exit;
}

session_start();

extract($_POST);

$_SESSION['cpf'] = $cpf;

$arq = fopen("../usuarios/" . $cpf . ".dat", "w");

fwrite($arq, $nome . "\n");
fwrite($arq, $cpf . "\n");
fwrite($arq, $cep . "\n");
fwrite($arq, $estado . "\n");
fwrite($arq, $cidade . "\n");
fwrite($arq, $bairro . "\n");
fwrite($arq, $endereco . "\n");

fclose($arq);

header("location:../cadastro2.php");

exit;
