<?php
include '../../controllers/contatoController.php';
include '../widgets/header.php';
session_start();
$contato = new ContatoController();

if (!empty($_POST)) {

    if (empty($_POST['id'])) {
        $contato->inserir($_POST);
    } else {
        $contato->atualizar($_POST);
    }
    header("location: " . $_SESSION['url']);


}
if (!empty($_GET['id'])) {
    $data = $contato->buscar($_GET['id']);
    //var_dump($data);
}
?>
<main class="container">
    <div class="row g-3">
        <div class="col-md-10 p-4">
            <div style="padding-top: 10px">
                <form action="contatoForm.php" method="post">
                    <div class="mb-3">
                        <h3>Formulário de contato</h3>
                        <div class="alert alert-warning" role="alert">
                            <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?><br>
                        </div>
                        <input type="hidden" name="id" value="<?php echo (!empty($data->id) ? $data->id : "") ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control"
                            value="<?php echo (!empty($data->nome) ? $data->nome : "") ?>" placeholder="Digite seu nome"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"
                            value="<?php echo (!empty($data->email) ? $data->email : "") ?>"
                            placeholder="Digite seu e-mail" required>
                    </div>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Telefone</label>
                        <input type="text" name="telefone" class="form-control"
                            value="<?php echo (!empty($data->telefone) ? $data->telefone : "") ?>"
                            placeholder="Digite seu telefone">
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-warning">
                                <?php echo (empty($_GET['id']) ? "Cadastrar" : "Atualizar") ?>
                            </button>
                        </div>
                        <div class="col-sm-3">
                            <a class="btn btn-warning" href="contatoList.php" role="button">Listar Dados</a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include "../widgets/rodape.php"; ?>