<?php
session_start();
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

    <div class="card">

        <div class="card_img">
            <img src="img/camisa1.jpeg" alt="Camisa">
        </div>

        <div class="card_info">
            <h2>Camisa Darkline Core </h2>
            <p>R$ 40,00 </p>

            <form action="processamento/adicionarcarrinho.php" method="POST">
                <input type="hidden" name="nome" value="Darkline Core">
                <input type="hidden" name="preco" value="40">

                <button>Adicionar ao carrinho</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card_img">
            <img src="img/camisa2.jpeg" alt="Camisa2">
        </div>

        <div class="card_info">
            <h2> Bloodline Spike Top </h2>
            <p>R$ 60,00 </p>

            <form action="processamento/adicionarcarrinho.php" method="POST">
                <input type="hidden" name="nome" value="Bloodline Spike">
                <input type="hidden" name="preco" value="60">

                <button>Adicionar ao carrinho</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card_img">
            <img src="img/camisa3.jpeg" alt="Moletom">
        </div>

        <div class="card_info">
            <h2> Moletom Devil Blood </h2>
            <p>R$ 120,00 </p>

            <form action="processamento/adicionarcarrinho.php" method="POST">
                <input type="hidden" name="nome" value="Devil Blood">
                <input type="hidden" name="preco" value="120">

                <button>Adicionar ao carrinho</button>
            </form>
        </div>
    </div>

     <div class="card">
        <div class="card_img">
            <img src="img/Calca.jpeg" alt="Calca">
        </div>

        <div class="card_info">
            <h2> Calça Ashwalker </h2>
            <p>R$ 125,00 </p>

            <form action="processamento/adicionarcarrinho.php" method="POST">
                <input type="hidden" name="nome" value="Ashwalker">
                <input type="hidden" name="preco" value="125">

                <button>Adicionar ao carrinho</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card_img">
            <img src="img/Saia.jpeg" alt="Saia">
        </div>

        <div class="card_info">
            <h2> Mini-saia Black Oath </h2>
            <p>R$ 90,00 </p>

            <form action="processamento/adicionarcarrinho.php" method="POST">
                <input type="hidden" name="nome" value="Black Oath">
                <input type="hidden" name="preco" value="90">

                <button>Adicionar ao carrinho</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card_img">
            <img src="img/Short.jpeg" alt="Short">
        </div>

        <div class="card_info">
            <h2> Venom Utility Shorts </h2>
            <p>R$ 50,00 </p>

            <form action="processamento/adicionarcarrinho.php" method="POST">
                <input type="hidden" name="nome" value="Venom Utility">
                <input type="hidden" name="preco" value="50">

                <button>Adicionar ao carrinho</button>
            </form>
        </div>
    </div>

</main>

</body>
</html>