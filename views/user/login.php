<?php
include "../../controllers/usuarioController.php";
include "../widgets/header.php";

session_start();
$login = new UsuarioController();

if (!empty($_POST)) {
    $login->logar($_POST);

    $dados = "";
    header("location: " . $_SESSION['url']);
} else if (!empty($_GET['sair'])) {
    session_destroy();
}
$dados = !empty($_SESSION['dados']) ? $_SESSION['dados'] : "";
?>
<main class="container">
    <div class="row g-3">
        <div class="col-md-10 p-4">
            <div style="padding-top: 10px">


                <h3>Login</h3>

                <form action="login.php" method="post">
                    <div class="alert alert-warning" role="alert">
                        <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="form-label">Login</label>
                            <input type="text" name="login" class="form-control"
                                value="<?php echo (!empty($dados['login']) ? $dados['login'] : "") ?>" /><br>
                        </div>
                        <div class="col-sm-2">
                            <label class="form-label">Senha</label>
                            <input type="password" name="senha" class="form-control" /><br>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-warning">Logar</button>
                    <a class="btn btn-warning" href="RegistrarUsuarioForm.php">Registrar-se</a></button>

                </form>
            </div>
        </div>
    </div>
</main>
<?php include "../widgets/rodape.php"; ?>