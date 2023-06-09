<?php $host = 'http://localhost/Livraria/';
include_once dirname(__FILE__, 3) . "\Util.php";
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

<body>
    <?php
    $dirName = "/Livraria";
    session_start();
    $login = !empty($_SESSION['nome']) ? $_SESSION['login'] : "";
    //$url_projeto = "http://" . $_SERVER['HTTP_HOST'] . dirname(dirname($_SERVER['SCRIPT_NAME'])) . DIRECTORY_SEPARATOR; //pega o host com o diretorio do projeto
    $url_projeto = "http://" . $_SERVER['HTTP_HOST'] . DIRECTORY_SEPARATOR; //pega o host do projeto
    ?>

    <header>
        <nav class="navbar navbar-expand-lg bg-body-yellow" id="nav">
            <div class="container-fluid">
                <div class="col-1 pt-1">
                    <img src="<?php echo $host ?>views/img/logo.png" alt="logo" width="100px" />
                </div>
                <div class="col-1 pt-1">
                    <h1>Livraria</h1>
                </div>
                <div class="col-10 pt-1 nav-justified" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . $dirName ?>\views\home\home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . $dirName ?>\views\product\produtoForm.php">Cadastro
                                de produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . $dirName ?>\views\order\orderForm.php">Cadastro
                                de pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . $dirName ?>\views\contact\contatoForm.php">Contato</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . $dirName ?>\views\devolution\devolution.php">Trocas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . $dirName ?>\views\aboutUs\aboutUs.php">Sobre
                                nós</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                                href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . $dirName ?>\views\user\login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>