<?php
require_once 'conexao.php';

$id_categoria = filter_input(INPUT_GET, 'id_categoria', FILTER_VALIDATE_INT);

if (!$id_categoria) {
    die("ID inválido.");
}

try {
    $stmt = $pdo->prepare("DELETE FROM categorias WHERE id_categoria = ?");
    $stmt->execute([$id_categoria]);

    header("Location: index.php?pagina=categorias");
    exit;

} catch (Exception $e) {
    die("Erro ao excluir: " . $e->getMessage());
}