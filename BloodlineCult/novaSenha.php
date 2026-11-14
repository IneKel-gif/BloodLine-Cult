<?php

if (!isset($_GET['token'])) {
    exit('Link de recuperação inválido.');
}

$token = $_GET['token'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Nova Senha</title>
    <link rel="stylesheet" href="css/recuperacao.css">
</head>
<body>

    <h1>Redefinir Senha</h1>

    <form action="processamento/novasenha.php" method="POST">

        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token, ENT_QUOTES, 'UTF-8'); ?>">

        <label>Nova senha:</label>
        <input type="password" name="senha" required>

        <br><br>

        <button type="submit">Alterar senha</button>

    </form>

</body>
</html>