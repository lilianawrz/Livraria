<?php
include '../../controllers/produtoController.php';
include "../widgets/header.php";
Util::verificarLogin();
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
<main class="container">
    <div class="row g-3">
        <div class="col-md-10 p-4">
            <div style="padding-top: 10px">
                <form action="produtoForm.php" method="post">
                    <div class="mb-3">
                        <h3>Cadastro de produto</h3>
                        <div class="alert alert-warning" role="alert">
                            <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?>
                        </div>
                        <input type="hidden" name="id" value="<?php echo (!empty($data->id) ? $data->id : "") ?>">
                        <label for="" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control"
                            value="<?php echo (!empty($data->nome) ? $data->nome : "") ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Imagem</label>
                        <input type="file" name="imagem" class="form-control"
                            value="<?php echo (!empty($data->imagem) ? $data->imagem : "") ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Quantidade</label>
                        <input type="number" name="quantidade" class="form-control"
                            value="<?php echo (empty($data->quantidade) ? "" : $data->quantidade) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Preço</label>
                        <input type="number" name="preco" step="0.1" class="form-control"
                            value="<?php echo (!empty($data->preco) ? $data->preco : "") ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Descrição</label>
                        <input type="text" name="descricao" class="form-control"
                            value="<?php echo (!empty($data->descricao) ? $data->descricao : "") ?>">
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-warning">
                                <?php echo (empty($_GET['id']) ? "Cadastrar" : "Atualizar") ?>
                            </button> <br>
                        </div>
                        <div class="col-sm-3">
                            <a class="btn btn-warning" href="produtoList.php">Ver os produtos</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include "../widgets/rodape.php" ?>