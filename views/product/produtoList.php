<?php
include '../BD.class.php';
$conn = new BD();
if (!empty($_GET['id'])) {
    $conn->deletar($_GET['id']);
    header("location:produtoList.php");
}
if (!empty($_POST)) {
    $load = $conn->pesquisar($_POST);
} else {
    $load = $conn->select();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Listagem</title>
</head>

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
        <input type="text" name="valor" placeholder="PesquisarProduto" />
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