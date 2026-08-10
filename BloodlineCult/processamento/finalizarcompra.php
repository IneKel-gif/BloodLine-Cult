<?php

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

$pagamento = $pagamento;
$numerovenda = rand(1000,9999);
$total = 0;

$arq = fopen("../vendas/".$_SESSION['usuario'].".dat", "a");


foreach($_SESSION['carrinho'] as $item)
{
    $total += $item['preco'] * $item['quantidade'];
}

fwrite(
    $arq,
    "Número da venda: ".$numerovenda."\n".
    "Usuário: ".$_SESSION['usuario']."\n".
    "Data: ".date("d/m/Y")."\n".
    "Hora: ".date("H:i:s")."\n".
    "Valor Total: ".$total."\n".
    "Pagamento: ".$pagamento."\n\n"
);

foreach($_SESSION['carrinho'] as $item){
    fwrite(
        $arq,
        "Produto: ".$item['nome']."\n".
        "Preço: ".$item['preco']."\n".
        "Quantidade: ".$item['quantidade']."\n\n"
    );
}

fclose($arq);

unset($_SESSION['carrinho']);

header("location:../inicio.php");
exit;

?>