<?php
include '../../models/BD.class.php';
include "../widgets/header.php";
session_start();
$produto = new ProdutoController();

if (!empty($_POST)) {

    if (empty($_POST['id'])) {
        $produto->inserir($_POST);
    } else {
        $produto->atualizar($_POST);
    }
    header("location: " . $_SESSION['url']);


}
if (!empty($_GET['id'])) {
    $data = $produto->buscar($_GET['id']);
    //var_dump($data);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produto</title>
</head>

<body>
    <form action="produtoForm.php" method="post">
        <h3>Cadastro de produto</h3>
        <?php echo (!empty($_GET["erro"]) ? $_GET["erro"] : " ") ?>
        <input type="hidden" name="id" value="<?php echo (!empty($data->id) ? $data->id : "") ?>"><br>
        <label for="">Nome</label>
        <input type="text" name="nome" value="<?php echo (!empty($data->nome) ? $data->nome : "") ?>"><br>
        <label for="">Quantidade</label>
        <input type="number" name="quantidade"
            value="<?php echo (empty($data->quantidade) ? "" : $data->quantidade) ?>"><br>
        <label for="">Preço</label>
        <input type="number" name="preco" step="0.1"
            value="<?php echo (!empty($data->preco) ? $data->preco : "") ?>"><br>
        <label for="">Descrição</label>
        <input type="text" name="descricao"
            value="<?php echo (!empty($data->descricao) ? $data->descricao : "") ?>"><br>
        <button type="submit">
            <?php echo (empty($_GET['id']) ? "Cadastrar" : "Atualizar") ?>
        </button> <br>

        <a href="produtoList.php">Ver os produtos</a>
    </form>

</body>

</html>