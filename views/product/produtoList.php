<?php
include '../../controllers/produtoController.php';
include "../widgets/header.php";
session_start();
$produto = new ProdutoController();

if (!empty($_GET['id'])) {
    $produto->deletar($_GET['id']);
    header("location: produtoList.php ");
    $_SESSION["msg"] = "Registro deletado com sucesso!";
}

$load = (!empty($_POST)) ? $produto->pesquisar($_POST) : $produto->select();

?>

<main class="container">
    <div class="row g-3">
        <div class="col-md-10 p-4">
            <div style="padding-top: 10px">
                <h3>Listagem de produtos</h3>
                <br>
                <form action="produtoList.php" method="post" class="form-inline">
                    <div class="row">
                        <div class="col-sm-2">
                            <select name="campo" class="form-control">
                                <option value="nome">Nome</option>
                                <option value="quantidade">Quantidade</option>
                                <option value="preco">Preço</option>
                                <option value="descricao">Descrição</option>
                            </select>
                        </div>
                        <div class="col-sm-6">

                            <input type="text" name="valor" class="form-control mr-sm-2"
                                placeholder="Pesquisar produto" />
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-warning">Buscar</button>
                            <a class="btn btn-warning" href="produtoForm.php">Cadastrar</a>
                        </div>
                </form>
            </div>
            </form>
            <br>
            <table class="table">
                <thead class="table-warning">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Descrição</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($load as $item) {
                        echo "<tr>";
                        echo "<td>" . $item->nome . "</td>";
                        echo "<td>" . $item->imagem . "</td>";
                        echo "<td>" . $item->quantidade . "</td>";
                        echo "<td>" . $item->preco . "</td>";
                        echo "<td>" . $item->descricao . "</td>";
                        echo "<td><a href='produtoForm.php?id=$item->id'>Editar</a></td>";
                        echo "<td><a onclick='return confirm(\"Deseja excluir?\")'href='produtoList.php?id=$item->id'>Deletar</a></td>";
                        echo "</tr>";

                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</main>

<?php include "../widgets/rodape.php" ?>