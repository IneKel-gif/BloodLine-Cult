
<?php

include "../app/cons.php";
require_once "../app/DLL.php";

session_start();

date_default_timezone_set("America/Sao_Paulo");

if(!isset($_SESSION['id_usuario'])){
    header("location:../login.php");
    exit;
}

if(!isset($_POST['pagamento'])){
    header("location:../carrinho.php");
    exit;
}

$pagamento = $_POST['pagamento'];

if(!in_array($pagamento, ['Pix', 'Cartao', 'Boleto'])){
    header("location:../carrinho.php");
    exit;
}

$id_usuario = (int) $_SESSION['id_usuario'];

$data = date("Y-m-d");
$hora = date("H:i:s");

$sql = "SELECT id_carrinho FROM carrinhos
        WHERE id_usuario = '$id_usuario'";

$resultado = banco($server, $user, $password, $db, $sql);

if($resultado->num_rows == 0){
    header("location:../carrinho.php");
    exit;
}

$linha = $resultado->fetch_assoc();
$id_carrinho = $linha['id_carrinho'];

$sql = "SELECT id_produto, quantidade FROM itens_carrinho
        WHERE id_carrinho = '$id_carrinho'";

$resultado = banco($server, $user, $password, $db, $sql);

if($resultado->num_rows == 0){
    header("location:../carrinho.php");
    exit;
}

$itens = [];
$total = 0;

while($item = $resultado->fetch_assoc()){

    $id_produto = $item['id_produto'];
    $quantidade = $item['quantidade'];

    $sql = "SELECT preco FROM produtos
            WHERE id_produto = '$id_produto'";

    $consulta = banco($server, $user, $password, $db, $sql);
    $produto = $consulta->fetch_assoc();

    $preco = $produto['preco'];

    $total += $preco * $quantidade;

    $itens[] = [
        "id_produto" => $id_produto,
        "preco" => $preco,
        "quantidade" => $quantidade
    ];
}

$sql = "INSERT INTO vendas
        (id_usuario, data, hora, valor_total, pagamento)
        VALUES
        ('$id_usuario', '$data', '$hora', '$total', '$pagamento')";

banco($server, $user, $password, $db, $sql);

// Recuperar o ID da venda criada
$sql = "SELECT id_venda FROM vendas
        WHERE id_usuario = '$id_usuario'
        ORDER BY id_venda DESC
        LIMIT 1";

$resultado = banco($server, $user, $password, $db, $sql);

$linha = $resultado->fetch_assoc();
$id_venda = $linha['id_venda'];

foreach($itens as $item){

    $id_produto = $item['id_produto'];
    $preco = $item['preco'];
    $quantidade = $item['quantidade'];

    $sql = "INSERT INTO itens_venda
            (id_venda, id_produto, preco, quantidade)
            VALUES
            ('$id_venda', '$id_produto', '$preco', '$quantidade')";

    banco($server, $user, $password, $db, $sql);
}

$sql = "DELETE FROM itens_carrinho
        WHERE id_carrinho = '$id_carrinho'";

banco($server, $user, $password, $db, $sql);

header("location:../inicio.php");
exit;

?>
