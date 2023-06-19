<?php
include "../../controllers/contatoController.php";
include "../widgets/header.php";
//include "../Util.php";

session_start();
// verificarLogin();

$contato = new ContatoController();

if (!empty($_GET['id'])) {
    $contato->deletar($_GET['id']);
    $_SESSION["msg"] = "Registro excluido com sucesso!";
    header("location: contatoList.php");
}

if (!empty($_POST)) {
    $load = $contato->pesquisar($_POST);
} else {
    $load = $contato->select();
}
//var_dump($load);
//exit;

if (!empty($_GET['msg']) || $_SESSION['msg'] == 0) {
    $_SESSION["msg"] = "";
}

?>
<p>
    Olá
    <?php echo $_SESSION['nome'] ?>, seja bem vindo! <a class="btn btn-warning" href="view/user/login.php?sair=1"
        role="button"> Sair </a>
</p>

<h3>Listagem Contatos</h3>
<p style="color:red">
    <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?><br>
</p>
<form action="contatoList.php" method="post">
    <select name="campo">
        <option value="nome">Nome</option>
        <option value="telefone">Telefone</option>
        <option value="email">Email</option>
    </select>
    <label>Valor</label>
    <input type="text" name="valor" placeholder="Pesquisar" />
    <button class="btn btn-warning" type="submit">Buscar</button>
    <a class="btn btn-warning" href="contatoForm.php?msg=0" role="button">Cadastrar</a><br><br>
</form>

<table class="table">
    <tr>
        <th scope="col">Nome</th>
        <th scope="col">Telefone</th>
        <th scope="col">Email</th>
        <th scope="col"> </th>
        <th scope="col"> </th>
    </tr>
    <?php
    foreach ($load as $item) {
        echo "<tr>";
        echo "<td>" . $item->nome . "</td>";
        echo "<td>" . $item->telefone . "</td>";
        echo "<td>" . $item->email . "</td>";
        echo "<td><a  href='contatoForm.php?id=$item->id'>Editar</a></td>";
        echo "<td><a onclick='return confirm(\"Deseja Excluir? \")' href='contatoList.php?id=$item->id'>Deletar</a></td>";
        echo "<tr>";
    }
    ?>
</table>
<?php include "../widgets/rodape.php"; ?>