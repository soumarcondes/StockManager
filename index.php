<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

include 'conexao.php';
include 'header.php';

$pagina = $_GET['pagina'] ?? 'home';

switch ($pagina) {
    case 'produtos':
        include 'produtos.php';
        break;
    case 'fornecedores':
        include 'fornecedores.php';
        break;
    case 'categorias':
        include 'categorias.php';
        break;
    case 'inserir_produto':
        include 'inserir_produto.php';
        break;
    case 'inserir_fornecedor':
        include 'inserir_fornecedor.php';
        break;
    case 'inserir_categoria':
        include 'inserir_categoria.php';
        break;
    default:
        include 'home.php';
        break;
}

include 'footer.php';