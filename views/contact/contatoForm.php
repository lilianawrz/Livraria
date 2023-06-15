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

<form action="contatoForm.php" method="post">
    <h3>Formulário Contato</h3>
    <p style="color:red">
        <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?><br>
    </p>
    <input type="hidden" name="id" value="<?php echo (!empty($data->id) ? $data->id : "") ?>"><br>
    <label for="nome">Nome</label>
    <input type="text" name="nome" value="<?php echo (!empty($data->nome) ? $data->nome : "") ?>"><br>
    <label for="email">Email</label>
    <input type="email" name="email" value="<?php echo (!empty($data->email) ? $data->email : "") ?>"><br>
    <label for="nome">Telefone</label>
    <input type="text" name="telefone" value="<?php echo (!empty($data->telefone) ? $data->telefone : "") ?>"><br>
    <button type="submit">
        <?php echo (empty($_GET['id']) ? "Cadastrar" : "Atualizar") ?>
    </button> <br>

    <a href="contatoList.php">Listar Dados</a>
</form>

<?php include "../widgets/rodape.inc.php"; ?>