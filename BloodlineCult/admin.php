<?php
    session_start();

    if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'admin'){
        header('location: login.php');
        exit;
    };
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <h1> Painel Administrativo </h1>

    <h2> Adicionar Produtos </h2>

    <form action="processamento/enviarproduto.php" method="POST" enctype="multipart/form-data">

        <label> Nome do produto </label>
        <input type="text" name="nome" required>

        <br><br>

        <label> Preço </label>
        <input type="number" name="preco" step="0.01" min="0" required>

        <br><br>

        <label> Imagem </label>
        <input type="file" name="imagem" accept=".jpg,.jpeg,.png" required>

        <br>

        <button type="submit"> Enviar </button>

    </form>

    <h2> Envio de Emails </h2>

    <form action="processamento/enviaremail.php" method="POST">

    <label> Destinatário </label>
    <input type="email" name="destinatario" required>

    <br><br>

    <label> Assunto </label>
    <input type="text" name="assunto" required>

    <br><br>

    <label> Mensagem </label>
    <textarea name="mensagem" required></textarea>

    <br><br>

    <button type="submit">Enviar E-mail</button>

</form>

    <a href="inicio.php"> Voltar para a loja </a>
    
</body>
</html>