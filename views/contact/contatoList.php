<?php
include "../../controllers/contatoController.php";
include "../widgets/header.php";
//include "../Util.php";

session_start();
//verificarLogin();

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

if (!empty($_GET['msg']) || $_GET['msg'] == 0) {
    $_SESSION["msg"] = "";
}

?>
Olá
<?php echo $_SESSION['nome'] ?>, seja bem vindo! <a href="view/user/login.php?sair=1"> Sair </a>

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
    <button type="submit">Buscar</button>
    <a href="contatoForm.php?msg=0">Cadastrar</a><br><br>
</form>

<table border="1">
    <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Email</th>
        <th></th>
        <th></th>
    </tr>
    <?php
    foreach ($load as $item) {
        echo "<tr>";
        echo "<td>" . $item->nome . "</td>";
        echo "<td>" . $item->telefone . "</td>";
        echo "<td>" . $item->email . "</td>";
        echo "<td><a href='contatoForm.php?id=$item->id'>Editar</a></td>";
        echo "<td><a onclick='return confirm(\"Deseja Excluir? \")' href='contatoList.php?id=$item->id'>Deletar</a></td>";
        echo "<tr>";
    }
    ?>
</table>
<?php include "./widgets/rodape.php"; ?>