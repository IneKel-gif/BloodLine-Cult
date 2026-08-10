<?php

session_start();

if(!isset($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = [];
}

$total = 0;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cinzel:wght@400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>

    <link rel="stylesheet" href="css/carrinho.css">
</head>
<body>

<h1 class="titulo">Seu Carrinho</h1>

<div class="carrinho">

<?php foreach ($_SESSION['carrinho'] as $item){

    $subtotal = $item['preco'] * $item['quantidade'];
    $total += $subtotal;

?>

<div class="item">

    <div class="info">
        <h3><?php echo $item['nome']; ?></h3>

        <p>Preço: R$ <?php echo $item['preco']; ?></p>
        <p>Quantidade: <?php echo $item['quantidade']; ?></p>
        <p>Subtotal: R$ <?php echo $subtotal; ?></p>
    </div>

    <div class="acoes">

        <form method="POST" action="processamento/adicionarcarrinho.php">
            <input type="hidden" name="nome" value="<?php echo $item['nome']; ?>">
            <button type="submit">+</button>
        </form>

        <form method="POST" action="processamento/removercarrinho.php">
            <input type="hidden" name="nome" value="<?php echo $item['nome']; ?>">
            <button type="submit">-</button>
        </form>

    </div>

</div>

<?php } ?>

</div>

<div class="resumo">

    <h2 class="total">
        Total: R$ <?php echo $total; ?>
    </h2>

    <div class="botoes_final">

        <a class="btn_voltar" href="inicio.php">
            Voltar à loja
        </a>

        <a class="btn_finalizar" href="processamento/confirmarcompra.php">
            Finalizar compra
        </a>

    </div>

</div>

</body>
</html>