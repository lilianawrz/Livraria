<?php
include '../../controllers/orderController.php';
include "../widgets/header.php";
Util::verificarLogin();
$pedido = new OrderController();

if (!empty($_POST)) {

    if (empty($_POST['id'])) {
        $pedido->inserir($_POST);
    } else {
        $pedido->atualizar($_POST);
    }
    header("location: " . $_SESSION['url']);


}
if (!empty($_GET['id'])) {
    $data = $pedido->buscar($_GET['id']);
    //var_dump($data);
}
?>
<main class="container">
    <div class="row g-3">
        <div class="col-md-10 p-4">
            <div style="padding-top: 10px">
                <form action="orderForm.php" method="post">
                    <div class="mb-3">
                        <h3>Cadastro de pedido</h3>
                        <div class="alert alert-warning" role="alert">
                            <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?>
                        </div>
                        <input type="hidden" name="id" value="<?php echo (!empty($data->id) ? $data->id : "") ?>">
                        <label for="" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control"
                            value="<?php echo (!empty($data->nome) ? $data->nome : "") ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Valor</label>
                        <input type="number" name="valor" step="0.1" class="form-control"
                            value="<?php echo (!empty($data->valor) ? $data->valor : "") ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Data</label>
                        <input type="date" name="data" class="form-control"
                            value="<?php echo (empty($data->data) ? "" : $data->data) ?>">
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-warning">
                                <?php echo (empty($_GET['id']) ? "Cadastrar" : "Atualizar") ?>
                            </button> <br>
                        </div>
                        <div class="col-sm-3">
                            <a class="btn btn-warning" href="orderList.php">Ver os pedidos</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include "../widgets/rodape.php" ?>