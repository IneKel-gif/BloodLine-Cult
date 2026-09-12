<?php

include "../app/cons.php";
require_once "../app/DLL.php";

if(!isset($_POST['pagamento']))
{
    header("location:../carrinho.php");
    exit;
}

session_start();

date_default_timezone_set("America/Sao_Paulo");

if(!isset($_SESSION['usuario'])){
    header("location:../login.php");
    exit;
}

extract($_POST);

$usuario = $_SESSION['usuario'];
$data = date("Y-m-d");
$hora = date("H:i:s");
$numerovenda = rand(1000,9999);
$total = 0;

foreach($_SESSION['carrinho'] as $item)
{
    $total += $item['preco'] * $item['quantidade'];
}

$sql = "INSERT INTO vendas (numero_venda, usuario, data, hora, valor_total, pagamento) VALUES ('$numerovenda', '$usuario', '$data', '$hora', '$total', '$pagamento')";
banco($server, $user, $password, $db, $sql);

foreach($_SESSION['carrinho'] as $item){
    $produto = $item['nome'];
    $preco = $item['preco'];
    $quantidade = $item['quantidade'];

    $sql = "INSERT INTO itens_venda (numero_venda, produto, preco, quantidade) VALUES ('$numerovenda', '$produto', '$preco', '$quantidade')";
    banco($server, $user, $password, $db, $sql);
}

unset($_SESSION['carrinho']);

header("location:../inicio.php");
exit;

?>