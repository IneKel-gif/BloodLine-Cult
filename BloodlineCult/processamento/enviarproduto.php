<?php
include "../app/cons.php";
require_once "../app/DLL.php";

session_start();

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'admin'){
    header('location: ../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    exit('Envie os dados pelo Aformulário.');
}

if (!isset($_FILES['imagem']) || !is_array($_FILES['imagem'])){
    exit("Imagem não recebida.");
}

$imagem = $_FILES['imagem'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];

if ($imagem['error'] != UPLOAD_ERR_OK){
    exit("Falha no carregamento da imagem");
}

$limite = 2 * 1024 * 1024;

if ($imagem['size'] <= 0 || $imagem['size'] > $limite) {
    exit('A imagem deve ter até 2 MiB.');
}

$tipos = [
    'image/jpeg' => 'jpg',
    'image/png' => 'png'
];

$info = finfo_open(FILEINFO_MIME_TYPE);

if ($info === false) {
    exit('Erro ao verificar a imagem.');
}

$mime = finfo_file($info, $imagem['tmp_name']);
finfo_close($info);

if ($mime === false || !isset($tipos[$mime])) {
    exit('Formato inválido. Envie JPG ou PNG.');
}

$pasta = __DIR__ . '/../uploads/';

$nomeNovo = bin2hex(random_bytes(16));
$nomeNovo .= '.' . $tipos[$mime];

$origem = $imagem['tmp_name'];
$destino = $pasta . $nomeNovo;

if (!move_uploaded_file($origem, $destino)) {
    exit('Erro ao salvar a imagem.');
}

$caminhoImagem = 'uploads/' . $nomeNovo;

$sql = "INSERT INTO produtos (nome, preco, imagem) VALUES ('$nome', '$preco', '$caminhoImagem')";

banco($server, $user, $password, $db, $sql);

header("location:../admin.php");
exit;

?>