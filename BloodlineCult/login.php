<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cinzel:wght@400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>

<div class="container_logo">
    <img src="img/Logo.png" alt="Bloodline Cult">
</div>

<div class="container_form">

    <form class="formulario" method="POST" action="processamento/processalogin.php">

        <h1> LOGIN </h1>

        <input type="text" placeholder="Digite seu usuário" name="usuario" required>
        <input type="password" placeholder="Digite sua senha"name="senha" required>

        <button class="botao"> Entrar </button>

        <h4> ou </h4>

        <a class="botao2" href="cadastro.php">Cadastre-se</a>

    </form>

</div>

</body>
</html>