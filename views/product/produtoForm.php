<?php
include '../../models/BD.class.php';
include "../widgets/cabecalho.inc.php";

$conn = new BD();

if (!empty($_POST)) {
    try {
        /* if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['nome'])) {
             throw new Exception("Somente letras e espaços em branco são permitidos.");
         }
         if (!is_numeric($_POST['quantidade'])) {
             throw new Exception("O valor deve ser numérico.");
         }
         if (!is_numeric($_POST['preco'])) {
             throw new Exception("O valor deve ser numérico.");
         }
         if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['descricao'])) {
               throw new Exception("Somente letras e espaços em branco são permitidos.");
           }*/

        if (empty($_POST['id'])) {
            $conn->inserirProduto($_POST);
        } else {
            $conn->atualizarProduto($_POST);
        }
        header("location: produtoList.php");

    } catch (Exception $e) {
        $id = $_POST['id'];
        header("location: produtoForm.php?id=$id&erro=" . $e->getMessage());
    }
}
if (!empty($_GET['id'])) {
    $data = $conn->buscarProduto($_GET['id']);
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