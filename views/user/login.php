<?php
include "../../controllers/usuarioController.php";
include "../widgets/header.php";

$conn = new BD();
session_start();

if (!empty($_POST)) {
    try {
        $usuario = $conn->login($_POST);

        if ($usuario) {
            $_SESSION["login"] = $_POST['login'];

            $url = "main.php";
        }
    } catch (Exception $e) {
        $login = $_POST['login'];
        $msg = "O login ou senha esta errado.Por favor, tente novamente.";
        $url = "login.php?login=$login&erro=" . $msg;
    }
    header("location: $url");
} elseif (!empty($_GET['sair'])) {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main class="container">
        <div class="row g-3">
            <div class="col-md-10 p-4">
                <div style="padding-top: 10px">
                    <form action="login.php" method="post">
                        <p style="color:red">
                            <?php echo (!empty($_GET["erro"]) ? $_GET["erro"] : "") ?>
                        </p>
                        <h3>Login</h3>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Usuário</label>
                            <input type="text" name="login"
                                value="<?php echo (!empty($_GET['login']) ? $_GET['login'] : "") ?>"
                                class="form-control" id="login" aria-describedby="emailHelp" placeholder="Seu usuário">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control" id="senha" placeholder="Senha">
                        </div><br>
                        <button type="submit" class="btn btn-warning">Entre</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>