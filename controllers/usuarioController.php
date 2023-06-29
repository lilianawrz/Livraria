<?php
include "../../models/BD.class.php";

class UsuarioController
{
    private $model;
    private $table = "usuario";
    public function __construct()
    {
        $this->model = new BD();
    }

    public function inserir($dados)
    {
        try {

            if (!preg_match("/^[a-zA-Z-' ]*$/", $dados['nome'])) {
                throw new Exception(" Somente letras e espaços em branco são permitidos. ");
            }

            if (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
                throw new Exception(" Formato de e-mail inválido. ");
            }
            if ($dados['senha'] === $dados['c_senha']) {

                $dados['senha'] = password_hash($dados['senha'], PASSWORD_BCRYPT);
                unset($dados['c_senha']);

                $this->model->inserir($this->table, $dados);

                $_SESSION['url'] = "login.php";
                $_SESSION['msg'] = "Registro salvo com sucesso";
            } else {
                throw new Exception(" As senhas devem se coincidirem!");
            }

        } catch (Exception $e) {
            $_SESSION['dados'] = $dados;
            $_SESSION['url'] = 'RegistrarUsuarioForm.php';
            $_SESSION['msg'] = $e->getMessage();
        }
    }
    public function logar($dados)
    {
        try {
            $usuario = $this->model->login($this->table, $dados);
            if ($usuario) {

                $_SESSION['url'] = "main.php";
                $_SESSION['nome'] = $usuario->nome;
            } else {
                throw new Exception(" Login ou senha está errado. Tente novamente.");
            }
            $_SESSION['login'] = $dados['login'];

        } catch (Exception $e) {
            $_SESSION['dados'] = $dados;
            $_SESSION['url'] = 'login.php';
            $_SESSION['msg'] = $e->getMessage();
        }
    }

    public function verificarLogin()
    {
        if (empty($_SESSION['nome'])) {
            session_start();
            session_destroy();
            header("Location: ../view/login.php");
        }
    }

}
?>