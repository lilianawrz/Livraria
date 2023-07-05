<?php
include "../../controllers/usuarioController.php";

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="<?php echo $host ?>views/css/style.css">
    <link rel="shortcut icon" href="<?php echo $host ?>views/img/icon.png" type="image/x-icon">
    <title>Rilian livraria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
</head>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>