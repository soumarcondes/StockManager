<?php
require_once 'conexao.php';

// BUSCAR PRODUTOS
$sql_produtos = $pdo->query("SELECT id_produto, nome_produto FROM produtos ORDER BY nome_produto");
$produtos = $sql_produtos->fetchAll(PDO::FETCH_ASSOC);

// BUSCAR FORNECEDORES
$sql_fornecedores = $pdo->query("SELECT id_fornecedor, nome_fornecedor FROM fornecedores ORDER BY nome_fornecedor");
$fornecedores = $sql_fornecedores->fetchAll(PDO::FETCH_ASSOC);

// DEFINIR PADRÃO
$editando = false;

$linha = [
    'id_categoria' => '',
    'id_produto' => '',
    'id_fornecedor' => '',
    'categoria' => ''
];

// SE ESTIVER EDITANDO
if (isset($_GET['editar'])) {

    $editando = true;
    $id_categoria = (int) $_GET['editar'];

    $stmt = $pdo->prepare("SELECT * FROM categorias WHERE id_categoria = ?");
    $stmt->execute([$id_categoria]);

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        $linha = $resultado;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $editando ? 'Editar Categoria' : 'Inserir Categoria'; ?></title>
    <style>
        h2 {
            color: white;
            text-align: center;
            margin-bottom: 30px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            font-size: 15px;
            font-weight: bold;
            box-sizing: border-box;
            border: 1px solid #ccc;
            margin-top: 8px;
            background-color: white;
            color: black;
        }

        label {
            display: block;
            color: white;
            font-weight: bold;
            margin: 5px 0 5px;
            font-size: 20px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h2><?php echo $editando ? 'Editar Categoria' : 'Inserir Nova Categoria'; ?></h2>
    <form class="inserir" action="<?php echo $editando ? 'editar_categoria.php' : 'inserir_categoria.php'; ?>" method="post">
        <input type="hidden" name="id_categoria" 
            value="<?php echo $linha['id_categoria']; ?>">

        <label>Produto</label>
        <select name="escolha_produto" required>
            <?php foreach ($produtos as $produto): ?>
                <option value="<?php echo $produto['id_produto']; ?>"
                    <?php if ($produto['id_produto'] == $linha['id_produto']) echo 'selected'; ?>>
                    <?php echo $produto['nome_produto']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Fornecedor</label>
        <select name="escolha_fornecedor" required>
            <?php foreach ($fornecedores as $fornecedor): ?>
                <option value="<?php echo $fornecedor['id_fornecedor']; ?>"
                    <?php if ($fornecedor['id_fornecedor'] == $linha['id_fornecedor']) echo 'selected'; ?>>
                    <?php echo $fornecedor['nome_fornecedor']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Categoria</label>
        <input type="text" name="categoria" value="<?php echo htmlspecialchars($linha['categoria']); ?>" required>

        <button class="button" type="submit"><?php echo $editando ? 'Atualizar' : 'Cadastrar'; ?></button>
    </form>
</body>
</html>