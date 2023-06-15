<?php
include '../../controllers/produtoController.php';
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
<form action="produtoForm.php" method="post">
    <h3>Cadastro de produto</h3>
    <p style="color:red">
        <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?><br>
    </p>
    <input type="hidden" name="id" value="<?php echo (!empty($data->id) ? $data->id : "") ?>"><br>
    <label for="">Nome</label>
    <input type="text" name="nome" value="<?php echo (!empty($data->nome) ? $data->nome : "") ?>"><br>
    <label for="">Quantidade</label>
    <input type="number" name="quantidade"
        value="<?php echo (empty($data->quantidade) ? "" : $data->quantidade) ?>"><br>
    <label for="">Preço</label>
    <input type="number" name="preco" step="0.1" value="<?php echo (!empty($data->preco) ? $data->preco : "") ?>"><br>
    <label for="">Descrição</label>
    <input type="text" name="descricao" value="<?php echo (!empty($data->descricao) ? $data->descricao : "") ?>"><br>
    <button type="submit">
        <?php echo (empty($_GET['id']) ? "Cadastrar" : "Atualizar") ?>
    </button> <br>

    <a href="produtoList.php">Ver os produtos</a>
</form>

</body>

</html>