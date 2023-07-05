<?php
include '../../controllers/orderController.php';
include "../widgets/header.php";
Util::verificarLogin();
$pedido = new OrderController();

if (!empty($_GET['id'])) {
    $pedido->deletar($_GET['id']);
    header("location: " . $_SESSION['url']);
}

if (!empty($_POST)) {
    $load = $pedido->pesquisar($_POST);
} else {
    $load = $pedido->select();
}

?>

<main class="container">
    <div class="row g-3">
        <div class="col-md-10 p-4">
            <div style="padding-top: 10px">
                <h3>Listagem de pedidos</h3>
                <br>
                <form action="orderList.php" method="post" class="form-inline">
                    <div class="row">
                        <div class="col-sm-2">
                            <select name="campo" class="form-control">
                                <option value="nome">Id</option>
                                <option value="nome">Nome</option>
                                <option value="valor">Valor</option>
                                <option value="data">Data</option>

                            </select>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="valor" class="form-control mr-sm-2"
                                placeholder="Pesquisar pedido" />
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-warning">Buscar</button>
                            <a class="btn btn-warning" href="orderForm.php">Cadastrar</a>
                        </div>
                    </div>
                </form>


                <br>
                <table class="table">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Data</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($load as $item) {
                            echo "<tr>";
                            echo "<td>" . $item->id . "</td>";
                            echo "<td>" . $item->nome . "</td>";
                            echo "<td>" . $item->valor . "</td>";
                            echo "<td>" . $item->data . "</td>";
                            echo "<td><a href='orderForm.php?id=$item->id'>Editar</a></td>";
                            echo "<td><a onclick='return confirm(\"Deseja excluir?\")'href='orderList.php?id=$item->id'>Deletar</a></td>";
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