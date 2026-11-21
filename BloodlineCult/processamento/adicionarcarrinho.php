<?php

include "../app/cons.php";
require_once "../app/DLL.php";

session_start();

if(!isset($_SESSION['id_usuario'])){
    header("location:../login.php");
    exit;
}

if(!isset($_POST['id_produto'])){
    header("location:../inicio.php");
    exit;
}

$id_usuario = (int) $_SESSION['id_usuario'];
$id_produto = (int) $_POST['id_produto'];

$sql = "SELECT id_produto FROM produtos WHERE id_produto = '$id_produto'";
$resultado = banco($server, $user, $password, $db, $sql);

if($resultado->num_rows == 0){
    header("location:../inicio.php");
    exit;
}

$sql = "SELECT id_carrinho FROM carrinhos WHERE id_usuario = '$id_usuario'";
$resultado = banco($server, $user, $password, $db, $sql);

if($resultado->num_rows == 0){
    $sql = "INSERT INTO carrinhos (id_usuario) VALUES ('$id_usuario')";
    $resultado = banco($server, $user, $password, $db, $sql);

    $sql = "SELECT id_carrinho FROM carrinhos WHERE id_usuario = '$id_usuario'";
    $resultado = banco($server, $user, $password, $db, $sql);
}

$linha = $resultado->fetch_assoc();
$id_carrinho = $linha['id_carrinho'];

$sql = "SELECT id_item_carrinho, quantidade FROM itens_carrinho WHERE id_carrinho = '$id_carrinho' AND id_produto = '$id_produto'";

$resultado = banco($server, $user, $password, $db, $sql);

if($resultado->num_rows > 0){
    $linha = $resultado->fetch_assoc();
    $quantidade = $linha['quantidade'] + 1;

    $sql = "UPDATE itens_carrinho SET quantidade = '$quantidade' WHERE id_item_carrinho = '".$linha['id_item_carrinho']."'";

    banco($server, $user, $password, $db, $sql);
} else {
    $sql = "INSERT INTO itens_carrinho (id_carrinho, id_produto, quantidade) VALUES ('$id_carrinho', '$id_produto', 1)";

    banco($server, $user, $password, $db, $sql);
}

header("location:../carrinho.php");
exit;

?>