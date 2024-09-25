<?php
require_once __DIR__ . '/../../controllers/product_controller.php';

$title = "Produtos";
require_once __DIR__ . '/../../views/layouts/header.php';

$productController = new ProductController();
$products = $productController->getAllProducts();
?>
    <h1>Produtos</h1>
        <div class="flex justify-c">
            <a href="create.php" class="btn justify-c">Novo Produto</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Ações</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td>
                            <a href="edit.php?id=<?php echo $product['id']; ?>" class="btn">Editar</a>
                        </td>
                        <!-- <td><?php echo $product['id']; ?></td> -->
                        <td><?php echo htmlspecialchars($product['name']); ?></td>
                        <td><?php echo htmlspecialchars($product['description']); ?></td>
                        <td><?php echo htmlspecialchars($product['price']); ?></td>
                        <td><?php echo htmlspecialchars($product['quantity']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
<?php require_once __DIR__ . '/../../views/layouts/footer.php'; ?>
