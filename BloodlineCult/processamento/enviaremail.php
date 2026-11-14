<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "../../vendor/autoload.php";

$config = require 'C:/xampp/config/smtp.php';

session_start();

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'admin') {
    header('location: ../login.php');
    exit;
}

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = $config['usuario'];
$mail->Password = $config['senha'];
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->CharSet = 'UTF-8';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    exit('Envie os dados pelo formulário.');
}

$destinatario = $_POST['destinatario'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

try {
    $mail->setFrom($config['usuario'], 'Bloodline Cult');
    $mail->addAddress($destinatario);

    $mail->isHTML(true);
    $mail->Subject = $assunto;
    $mail->Body = $mensagem;
    $mail->AltBody = $mensagem;

    $mail->send();

    echo 'E-mail enviado com sucesso!';
} catch (Exception $e) {
    error_log('Erro PHPMailer: ' . $mail->ErrorInfo);
    echo 'Falha no envio. Consulte o log do PHP.';
}

?>