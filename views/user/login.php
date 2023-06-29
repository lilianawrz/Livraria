<?php
include "../../controllers/usuarioController.php";
include "../widgets/header.php";

session_start();
$login = new UsuarioController();

if (!empty($_POST)) {
    $login->logar($_POST);
    header("location: " . $_SESSION['url']);

} else if ((!empty($_GET['sair']))) {
    session_destroy();
}
$dados = $_SESSION['dados'];
?>



<h3>Login</h3>
<form action="login.php" method="post">
    <p style="color:red">
        <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?>
    </p>
    <label>Login</label>
    <input type="text" name="login" value="<?php echo (!empty($dados['login']) ? $dados['login'] : "") ?>" /><br>
    <label>Senha</label>
    <input type="password" name="senha" /><br>
    <button type="submit">Logar</button>
</form>

<?php include "../widgets/rodape.php"; ?>