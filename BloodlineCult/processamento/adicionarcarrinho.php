<?php

session_start();

if(!isset($_SESSION['usuario'])){
    header("location:../login.php");
    exit;
}

extract($_POST);

if(!isset($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = [];
}

if(isset($_SESSION['carrinho'][$nome])){
    $_SESSION['carrinho'][$nome]['quantidade']++;
}

else{
    $_SESSION['carrinho'][$nome] = [
        "nome" => $nome,
        "preco" => $preco,
        "quantidade" => 1
    ];
}

header("location:../carrinho.php");
exit;

?>