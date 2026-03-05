<?php
// Permissões (exemplo)
$nivel_usuario = $_SESSION['nivel'] ?? '';
$permitir_editar_excluir = ($nivel_usuario === 'admin');

$sql = $pdo->query("
    SELECT categorias.*, produtos.nome_produto, fornecedores.nome_fornecedor
    FROM categorias
    JOIN produtos ON categorias.id_produto = produtos.id_produto
    JOIN fornecedores ON categorias.id_fornecedor = fornecedores.id_fornecedor
");

$categorias = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <style>
        #menu a[href="?pagina=categorias"] {
            color: rgb(255, 115, 0);
            font-weight: bold;
        }
        th, td {
            border: 1px solid #000;
            text-align: center;
        }
        th {
            border: 1px solid #000000;
            background-color: #ddd;
        }
        td{
            background-color: white;
        }
    </style>
</head>
<body>
    <main>
        <div class="main">
            <div id="logoc">
                <img src="img/logoc.png" alt="Logo">
                <h1>Categorias</h1>
            </div>
            <?php if ($permitir_editar_excluir): ?>
                <div id="inserir">
                    <a href="?pagina=inserir_categoria">Nova Categoria <i class="fa-solid fa-plus"></i></a>
                </div>
            <?php endif; ?>
            <table style="border:1px solid #ccc; width:100%; text-align: center;" id="categorias" style="width:100%;">
                <thead>
                    <tr style="background-color: #ddd;">
                        <th style="text-align:center;">Produto</th>
                        <th style="text-align:center;">Nome do Fornecedor</th>
                        <th style="text-align:center;">Categoria</th>
                        <?php if ($permitir_editar_excluir): ?>
                            <th style="text-align:center;">Editar</th>
                            <th style="text-align:center;">Remover</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categorias as $cat): ?>
                        <tr style="background-color: white;">
                            <td style="text-align: center;border: 1px solid #000000;"><?php echo htmlspecialchars($cat['nome_produto']); ?></td>
                            <td style="text-align: center;border: 1px solid #000000;"><?php echo htmlspecialchars($cat['nome_fornecedor']) ?></td>
                            <td style="text-align: center;border: 1px solid #000000;"><?php echo htmlspecialchars($cat['categoria']) ?></td>
                            <?php if ($permitir_editar_excluir): ?>
                                <td style="text-align: center;border: 1px solid #000000;">
                                    <a href="?pagina=inserir_categoria&editar=<?php echo $cat['id_categoria']; ?>">
                                        <i class="fa-solid fa-user-pen"></i>
                                    </a>
                                </td>
                                <td style="text-align: center;border: 1px solid #000000;">
                                    <a href="excluir_categoria.php?id_categoria=<?php echo $cat['id_categoria']; ?>" onclick="return confirm('Deseja excluir este registro?')">
                                        <i class="fa-solid fa-trash-can" style="color: #ff4747;"></i>
                                    </a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>