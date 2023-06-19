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

<main class="container">
    <div class="row g-3">
        <div class="col-md-10 p-4">
            <div style="padding-top: 10px">
                <h3>Listagem de produtos</h3>
                <form action="produtoList.php" method="post">
                    <select name="campo" class="form-control">
                        <option value="nome">Nome</option>
                        <option value="quantidade">Quantidade</option>
                        <option value="preco">Preço</option>
                        <option value="descricao">Descrição</option>
                    </select>
                    <label>Valor</label>
                    <input type="text" name="valor" class="form-control" placeholder="Pesquisar produto" />
                    <br>
                    <button type="submit" class="btn btn-warning">Buscar</button> <a class="btn btn-warning"
                        href="produtoForm.php">Cadastrar</a>
                </form>
                <br>
                <table class="table">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Descrição</th>
                    </tr>
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
                </table>

                <div class="col-sm p-2">
                    <div class="card" style="width: 200px">
                        <img src="\Img\belasmaldi.jpg" class="card-img-top" alt="..." height="250px">
                        <div class="card-body">
                            <h6 class="card-title">
                            </h6>
                            <p class="card-text">O mundo vai acabar em um sábado. No
                                próximo sábado, para falar a verdade. Pouco antes da
                                hora do jantar.</p>
                            <a href="#" class="btn btn-warning">Comprar</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<?php include "../widgets/rodape.php" ?>