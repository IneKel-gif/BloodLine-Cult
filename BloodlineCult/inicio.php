<?php
session_start();

include "app/cons.php";
require_once "app/DLL.php";

$sql = "SELECT * FROM produtos";
$produtos = banco($server, $user, $password, $db, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cinzel:wght@400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/inicio.css">
    <title>Inicio | Bloodline Cult</title>
</head>
<body>

<header class="topo">

    <div class="logo_topo">
        <img src="img/Logoheader.png" alt="Bloodline Cult">
    </div>

    <div class="botoes_topo">

        <?php
        if(isset($_SESSION['usuario'])){
            echo '<a class="btn_topo" href="processamento/logout.php">Sair</a>';
        } else {
            echo '<a class="btn_topo" href="login.php">Entrar</a>';
        }
        ?>

        <a class="btn_topo" href="carrinho.php">Carrinho</a>

    </div>

</header>

<section class="banner">
    <img src="img/banner.jpeg" alt="Bloodline Cult Banner">
</section>

<main class="vitrine">

<?php
while ($produto = $produtos->fetch_assoc()) {
?>

<div class="card">

    <div class="card_img">
        <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>">
    </div>

    <div class="card_info">
        <h2><?php echo $produto['nome']; ?></h2>

        <p>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>

        <form action="processamento/adicionarcarrinho.php" method="POST">
            <input type="hidden" name="nome" value="<?php echo $produto['nome']; ?>">
            <input type="hidden" name="preco" value="<?php echo $produto['preco']; ?>">

            <button>Adicionar ao carrinho</button>
        </form>
    </div>

</div>

<?php
}
?>
</main>

</body>
</html>