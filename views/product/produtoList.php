<?php
include '../../controllers/produtoController.php';
include "../widgets/header.php";
session_start();
$produto = new ProdutoController();

if (!empty($_GET['id'])) {
    $produto->deletar($_GET['id']);
    header("location: " . $_SESSION['url']);
}

if (!empty($_POST)) {
    $load = $produto->pesquisar($_POST);
} else {
    $load = $produto->select();
}

?>
<html>
<body>

    <h3>Listagem de produtos</h3>
    <form action="produtoList.php" method="post">
        <select name="campo">
            <option value="nome">Nome</option>
            <option value="quantidade">Quantidade</option>
            <option value="preco">Preço</option>
            <option value="descricao">Descrição</option>
        </select>
        <label>Valor</label>
        <input type="text" name="valor" placeholder="Pesquisar produto" />
        <button type="submit">Buscar</button> <a href="produtoForm.php">Cadastrar</a>
    </form>
    <br>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Descrição</th>
        </tr>
        <?php
        foreach ($load as $item) {
            echo "<tr>";
            echo "<td>" . $item->nome . "</td>";
            echo "<td>" . $item->quantidade . "</td>";
            echo "<td>" . $item->preco . "</td>";
            echo "<td>" . $item->descricao . "</td>";
            echo "<td><a href='produtoForm.php?id=$item->id'>Editar</a></td>";
            echo "<td><a onclick='return confirm(\"Deseja excluir?\")'href='produtoList.php?id=$item->id'>Deletar</a></td>";
            echo "</tr>";

        }

        ?>
    </table>


</body>

</html>