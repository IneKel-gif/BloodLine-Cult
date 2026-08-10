<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cinzel:wght@400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/cadastro.css">
    <title>Cadastro | Parte 1</title>
</head>

<body>

    <div class="container_logo">
        <img src="img/Logo.png" alt="Bloodline Cult">
    </div>

    <div class="container_form">

        <form class="formulario" method="POST" action="processamento/salvarusuario.php">

            <h1> CADASTRO </h1>

            <input type="text" name="nome" placeholder="Digite seu nome completo" required>

            <input type="text" name="cpf" placeholder="Digite seu CPF" required>

            <div class="linha">
                <input class="pequeno" type="text" name="cep" placeholder="CEP" required>
                <input class="pequeno" type="text" name="estado" placeholder="Estado" required>
            </div>

            <div class="linha">
                <input class="pequeno" type="text" name="cidade" placeholder="Cidade" required>
                <input class="pequeno" type="text" name="bairro" placeholder="Bairro" required>
            </div>

            <input type="text" name="endereco" placeholder="Digite seu endereço" required>

            <button class="botao"> Próxima etapa </button>

            <h4> ou </h4>

            <a class="botao2" href="login.php">Entrar</a>

        </form>

    </div>

</body>

</html>