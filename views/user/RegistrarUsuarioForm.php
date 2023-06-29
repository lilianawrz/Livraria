<?php
include '../../controllers/usuarioController.php';
include "../widgets/header.php";
session_start();
$login = new UsuarioController();


if (!empty($_POST)) {

    $login->inserir($_POST);
    $_SESSION['dados'] = "";
    header("location: " . $_SESSION['url']);
}
$dados = !empty($_SESSION['dados']) ? $_SESSION['dados'] : "";
?>

<main class="container">
    <div class="row g-3">
        <div class="col-md-10 p-4">
            <div style="padding-top: 10px">

                <form action="RegistrarUsuarioForm.php" method="post">

                    <h3>Formulário Registrar Usuário</h3>
                    <div class="alert alert-warning" role="alert">
                        <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?>
                    </div>
                    <label for="" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control"
                        value="<?php echo (!empty($dados['nome']) ? $dados['nome'] : "") ?>"><br>

                    <label for="" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control"
                        value="<?php echo (!empty($dados['email']) ? $dados['email'] : "") ?>"><br>

                    <label for="" class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control"
                        value="<?php echo (!empty($dados['telefone']) ? $dados['telefone'] : "") ?>"><br>

                    <label for="" class="form-label">Login</label>
                    <input type="text" name="login" class="form-control"
                        value="<?php echo (!empty($dados['login']) ? $dados['login'] : "") ?>"><br>

                    <label for="" class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control"><br>

                    <label for="" class="form-label">Confirmar Senha</label>
                    <input type="password" name="c_senha" class="form-control"><br>
                    <div class="row">
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-warning"> Cadastrar</button>
                        </div>
                        <div class="col-sm-3">
                            <a href="login.php" class="btn btn-warning">Voltar</a><br><br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
include "../widgets/rodape.php" ?>