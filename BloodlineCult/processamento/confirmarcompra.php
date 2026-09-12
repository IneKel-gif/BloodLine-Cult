<?php

include "../app/cons.php";
require_once "../app/DLL.php";

session_start();

if(!isset($_SESSION['usuario']))
{
    header("location:../login.php");
    exit;
}

$usuario = $_SESSION['usuario'];

$consulta = "SELECT * FROM logins WHERE usuario = '$usuario'";
$resultado = banco($server, $user, $password, $db, $consulta);
$linha = $resultado -> fetch_assoc();

$cpf = $linha['cpf'];

$consulta = "SELECT * FROM usuarios WHERE cpf = '$cpf'";
$resultado = banco($server, $user, $password, $db, $consulta);
$linha = $resultado -> fetch_assoc();

$nome = $linha['nome'];
$cpf = $linha['cpf'];
$cep = $linha['cep'];
$estado = $linha['estado'];
$cidade = $linha['cidade'];
$bairro = $linha['bairro'];
$endereco = $linha['endereco'];

$total = 0;

if(!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho']))
{
    header("location:../carrinho.php");
    exit;
}

foreach($_SESSION['carrinho'] as $item)
{
    $total += $item['preco'] * $item['quantidade'];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cinzel:wght@400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/confirmar.css">
    <title>Confirmar Dados</title>
</head>
<body>

<h1 class="titulo">Confirmar Compra</h1>

<div class="checkout">

    <div class="bloco">

        <h2>Dados do Cliente</h2>

        <p><strong>Nome:</strong> <?php echo $nome; ?></p>
        <p><strong>CPF:</strong> <?php echo $cpf; ?></p>
        <p><strong>CEP:</strong> <?php echo $cep; ?></p>
        <p><strong>Estado:</strong> <?php echo $estado; ?></p>
        <p><strong>Cidade:</strong> <?php echo $cidade; ?></p>
        <p><strong>Bairro:</strong> <?php echo $bairro; ?></p>
        <p><strong>Endereço:</strong> <?php echo $endereco; ?></p>

    </div>

    <div class="bloco">

        <h2>Resumo da Compra</h2>

        <p class="total">
            Total: R$ <?php echo $total; ?>
        </p>

        <form action="finalizarcompra.php" method="POST">

            <label>Forma de pagamento</label>

            <select name="pagamento">
                <option value="" disabled selected>Selecione a forma de pagamento</option>
                <option value="Pix">Pix</option>
                <option value="Cartao">Cartão</option>
                <option value="Boleto">Boleto</option>
            </select>

            <div class="botoes">

                <button class="btn_confirmar">Confirmar</button>

                <a class="btn_cancelar" href="../carrinho.php">Cancelar</a>

            </div>
        </form>

    </div>

</div>

</body>
</html>