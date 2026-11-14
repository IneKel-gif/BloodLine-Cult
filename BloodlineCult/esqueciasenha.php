<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="css/recuperacao.css">
</head>
<body>

    <h1>Recuperar Senha</h1>

    <form action="processamento/recuperarsenha.php" method="POST">

        <label>Digite seu e-mail:</label>
        <input type="email" name="email" required>

        <br><br>

        <button type="submit">Enviar link de recuperação</button>

    </form>

    <a href="login.php">Voltar ao login</a>

</body>
</html>