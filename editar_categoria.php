<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Acesso inválido.";
    exit;
}

$id_categoria = filter_input(INPUT_POST, 'id_categoria', FILTER_VALIDATE_INT);
$escolha_produto = $_POST['escolha_produto'] ?? null;
$escolha_fornecedor = $_POST['escolha_fornecedor'] ?? null;
$categoria = $_POST['categoria'] ?? null;

if (!$id_categoria || !$escolha_produto || !$escolha_fornecedor || !$categoria) {
    echo "Dados incompletos.";
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE categorias SET id_produto = ?, id_fornecedor = ?, categoria = ? WHERE id_categoria = ?");
    $stmt->execute([$escolha_produto, $escolha_fornecedor, $categoria, $id_categoria]);

    header('Location: index.php?pagina=categorias');
    exit;
} catch (Exception $e) {
    echo "Erro ao atualizar: " . $e->getMessage();
}