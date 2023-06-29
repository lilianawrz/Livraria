<?php
include "../../controllers/contatoController.php";
include "../widgets/header.php";

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
//var_dump($load);
//exit;

if (!empty($_GET['msg']) || $_SESSION['msg'] == 0) {
    $_SESSION["msg"] = "";
}

?>

<main class="container">
    <div class="row g-3">
        <div class="col-md-10 p-4">
            <div style="padding-top: 10px">

                <p>
                    Olá
                    <?php echo $_SESSION['nome'] ?>, seja bem vindo! <a class="btn btn-warning"
                        href="view/user/login.php?sair=1" role="button"> Sair </a>
                </p>
                <br>
                <h3>Listagem Contatos</h3>
                <form action="contatoList.php" method="post" class="form-inline">
                    <div class="row">
                        <div class="col-sm-2">
                            <select name="campo" class="form-control">
                                <option value="nome">Nome</option>
                                <option value="telefone">Telefone</option>
                                <option value="email">Email</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="valor" class="form-control mr-sm-2"
                                placeholder="Pesquisar mensagens" />
                        </div>
                        <div class="col-sm-4">
                            <button class="btn btn-warning" type="submit">Buscar</button>
                            <a class="btn btn-warning" href="contatoForm.php?msg=0" role="button">Cadastrar</a>
                        </div>
                </form>

            </div>

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
        </div>
    </div>
</main>
<?php include "../widgets/rodape.php"; ?>