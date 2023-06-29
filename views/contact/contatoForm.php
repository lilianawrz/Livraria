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

                <h3>Localização</h3><br>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3551.7083208451686!2d-52.613843285124574!3d-27.102491407673252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e4b7c59596d26d%3A0xce0d83f7148ab1b6!2sLivraria%20Letture%20Livros%20e%20Arte!5e0!3m2!1spt-BR!2sbr!4v1681091986873!5m2!1spt-BR!2sbr"
                    width="800" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <?php include "../home/components/menuLateral.php" ?>
    </div>
</main>
<?php include "../widgets/rodape.php"; ?>