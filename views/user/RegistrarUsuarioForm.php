<?php
include '../../controllers/usuarioController.php';
include "../widgets/header.php";

session_start();
$login = new UsuarioController();

if (!empty($_POST)) {

    $login->inserir($_POST);

    $_SESSION['dados'] = '';

    header("location:" . $_SESSION['url']);
} else {
    $dados = $_SESSION['dados'];
}
?>
<form action="RegistrarUsuarioForm.php" method="post">
    <h3>Formulário Registrar Usuário</h3>
    <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?><br>
    <label for="">Nome</label>
    <input type="text" name="nome" value="<?php echo (!empty($dados['nome']) ? $dados['nome'] : "") ?>"><br>

    <label for="">Email</label>
    <input type="text" name="email" value="<?php echo (!empty($dados['email']) ? $dados['email'] : "") ?>"><br>

    <label for="">Telefone</label>
    <input type="text" name="telefone" value="<?php echo (!empty($dados['telefone']) ? $dados['telefone'] : "") ?>"><br>

    <label for="">Login</label>
    <input type="text" name="login" value="<?php echo (!empty($dados['login']) ? $dados['login'] : "") ?>"><br>

    <label for="">Senha</label>
    <input type="password" name="senha"><br>

    <label for="">Confirmar Senha</label>
    <input type="password" name="c_senha"><br>

    <button type="submit"> Cadastrar</button><br>
    <a href="login.php">Voltar</a><br><br>
</form>

<?php
include "../widgets/rodape.php" ?>