<?php include "../BD.class.php";

$conn = new BD();
if (!empty($_GET['id'])) {
    $conn->deletar($_GET['id']);
    header("location:usuarioList.php");
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
    <title>Document</title>
</head>

<body>
    <h3>Listagem contatos</h3>
    <form action="usuarioList.php" method="post">
        <select name="campo">
            <option value="nome">Nome</option>
            <option value="telefone">Telefone</option>
            <option value="email">Email</option>
        </select>
        <label>Valor</label>
        <input type="text" name="valor" placeholder="Pesquisar" />
        <button type="submit">Buscar</button> <a href="usuarioForm.php">Cadastrar</a>
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
            echo "<td><a href='usuarioForm.php?id=$item->id'>Editar</a></td>";
            echo "<td><a onclick='return confirm(\"Deseja excluir?\")'href='usuarioList.php?id=$item->id'>Deletar</a></td>";
            echo "</tr>";

        }

        ?>
    </table>


</body>

</html>