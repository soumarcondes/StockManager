<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema de Gestão de Estoque</title>
    <link rel="stylesheet" href="css/style.css" />
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css" />
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- DataTables JS -->
    <script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a84022c447.js" crossorigin="anonymous"></script>
    <style>
        img {
            float: left;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('#produtos').dataTable();
            $('#fornecedores').dataTable();
            $('#categorias').dataTable();
        });
    </script>
</head>
<body>
<header>
    <div class="container">
        <div class="logo">
            <img class="logop" src="img/logo.png" title="Logo" alt="Logo" />
            <h1 class="log">Stock Manager</h1>
        </div>
        <div id="menu">
            <a href="home.php"><i class="fa-solid fa-house fa-2xl"></i></a>
            <a href="?pagina=produtos">Produtos</a>
            <a href="?pagina=fornecedores">Fornecedores</a>
            <a href="?pagina=categorias">Categorias</a>
            <?php if (isset($_SESSION['usuario'])) : ?>
                <a href="logout.php"><?php echo htmlspecialchars($_SESSION['usuario']); ?> (sair)</a>
            <?php endif; ?>
        </div>
    </div>
</header>

<div id="conteudo" class="container">