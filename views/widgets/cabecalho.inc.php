<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css">
    <title>Ebook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
</head>

<body>

    <?php

    $dirName = "/Livraria";
    ?>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-yellow" id="nav">
            <div class="container-fluid">
                <div class="col-1 pt-1">
                    <img src="\Img\logo.png" alt="logo" width="100px" />
                </div>
                <div class="col-1 pt-1">
                    <h1>Livraria</h1>
                </div>
                <div class="col-10 pt-1 nav-justified" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                                href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . $dirName ?>\views\product\produtoList.php">ProdLIST</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="views\product\produtoForm.php">ProdFORM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="views\user\usuarioList.php">Cad User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="empresa.html">Sobre
                                nós</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="HTML Livraria\Principal\contato.html">Contato</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="troca.html">Politica de troca</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>