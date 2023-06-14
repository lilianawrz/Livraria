<?php
include '../../controllers/contatoController.php';
include "../widgets/header.php";
session_start();
$contato = new ContatoController();
if (!empty($_GET['id'])) {
    $contato->deletar($_GET['id']);
    header("location:" . $_SESSION['url']);
}
if (!empty($_POST)) {
    $load = $contato->pesquisar($_POST);
} else {
    $load = $contato->select();
}

?>

<h3>Listagem contatos</h3>
<form action="contatoList.php" method="post">
    <select name="campo">
        <option value="nome">Nome</option>
        <option value="telefone">Telefone</option>
        <option value="email">Email</option>
    </select>
    <label>Valor</label>
    <input type="text" name="valor" placeholder="Pesquisar" />
    <button type="submit">Buscar</button> <a href="contatoForm.php">Cadastrar</a>
</form>
<br>
<table border="1">
    <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>E-mail</th>
    </tr>
    <?php
    foreach ($load as $item) {
        echo "<tr>";
        echo "<td>" . $item->nome . "</td>";
        echo "<td>" . $item->telefone . "</td>";
        echo "<td>" . $item->email . "</td>";
        echo "<td><a href='contatoForm.php?id=$item->id'>Editar</a></td>";
        echo "<td><a onclick='return confirm(\"Deseja excluir?\")'href='contatoList.php?id=$item->id'>Deletar</a></td>";
        echo "</tr>";

    }

    ?>
</table>


</body>

</html>