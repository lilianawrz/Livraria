<?php
class Util
{
    public static function verificarLogin()
    {
        if (empty($_SESSION['nome'])) {
            session_start();
            session_destroy();
            header("Location: http://" . $_SERVER['HTTP_HOST'] . "/Livraria/views/user/login.php");
        }
    }
}
?>