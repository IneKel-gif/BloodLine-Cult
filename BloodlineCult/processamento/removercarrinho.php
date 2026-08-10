<?php

if(!isset($_POST['nome'])){
    header("location:../carrinho.php");
    exit;
}

session_start();

extract($_POST);

if(isset($_SESSION['carrinho'][$nome])){
    $_SESSION['carrinho'][$nome]['quantidade']--;

    if($_SESSION['carrinho'][$nome]['quantidade'] <= 0){
        unset($_SESSION['carrinho'][$nome]);
    }
}

header("Location:../carrinho.php");
exit;

?>