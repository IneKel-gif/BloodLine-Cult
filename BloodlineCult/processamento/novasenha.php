<?php

include "../app/cons.php";
require_once "../app/DLL.php";

if (!isset($_POST['token']) || !isset($_POST['senha'])) {
    exit('Dados inválidos.');
}

$token = $_POST['token'];
$senha = md5($_POST['senha']);

$consulta = "SELECT * FROM logins WHERE token_recuperacao = '$token' AND expiracao_token > NOW()";

$resultado = banco($server, $user, $password, $db, $consulta);
$linha = $resultado->fetch_assoc();

if (!$linha) {
    exit('Link inválido ou expirado.');
}

$cpf = $linha['cpf'];

$consulta = "UPDATE logins SET senha = '$senha', token_recuperacao = NULL, expiracao_token = NULL WHERE cpf = '$cpf'";

banco($server, $user, $password, $db, $consulta);

echo 'Senha alterada com sucesso! <a href="../login.php">Fazer login</a>';

?>