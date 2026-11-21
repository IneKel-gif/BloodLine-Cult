<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include "../app/cons.php";
require_once "../app/DLL.php";
require_once "../../vendor/autoload.php";

$config = require 'C:/xampp/config/smtp.php';


if (!isset($_POST['email'])) {
    header("location: ../esquecisenha.php");
    exit;
}

$email = $_POST['email'];

$consulta = "SELECT * FROM logins WHERE email = '$email'";
$resultado = banco($server, $user, $password, $db, $consulta);
$linha = $resultado->fetch_assoc();

if (!$linha) {
    exit('E-mail não encontrado.');
}

$token = bin2hex(random_bytes(32));

$expiracao = date('Y-m-d H:i:s', strtotime('+30 minutes'));

$id_login = $linha['id_login'];

$consulta = "UPDATE logins SET token_recuperacao = '$token', expiracao_token = '$expiracao' WHERE id_login = '$id_login'";

banco($server, $user, $password, $db, $consulta);

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = $config['usuario'];
$mail->Password = $config['senha'];
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->CharSet = 'UTF-8';

$link = "http://localhost/BloodLine-Cult/BloodlineCult/novaSenha.php?token=" . $token;

try {
    $mail->setFrom($config['usuario'], 'Bloodline Cult');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Recuperação de senha - Bloodline Cult';

    $mail->Body = "
        <h2>Recuperação de senha</h2>
        <p>Recebemos uma solicitação para redefinir sua senha.</p>
        <p>Clique no link abaixo para cadastrar uma nova senha:</p>
        <a href='$link'>Redefinir minha senha</a>
        <p>Este link expira em 30 minutos.</p>
    ";

    $mail->AltBody = "Acesse este link para redefinir sua senha: $link";

    $mail->send();

    echo 'Link de recuperação enviado para seu e-mail!';
} catch (Exception $e) {
    error_log('Erro PHPMailer: ' . $mail->ErrorInfo);
    echo 'Falha no envio do e-mail.';
}

?>