<?php
require_once __DIR__ . '/../../controllers/product_controller.php';

$title = "Cadastrar Produto";
require_once __DIR__ . '/../../views/layouts/header.php';
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productController = new ProductController();
    $productController->createProduct([
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'quantity' => $_POST['quantity']
    ]);
    header("Location: index.php");
}
?>
<body>
    <div class="container">
        <h1>Cadastrar Produto</h1>
        <form action="create.php" method="POST">
            <div class="form-btn">
                <button type="submit" class="btn">Cadastrar</button>
            </div>
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="price">Preço:</label>
                <input type="number" step="0.01" name="price" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantidade:</label>
                <input type="number" name="quantity" required>
            </div>
        </form>
        <a href="index.php" class="btn">Voltar</a>
    </div>
</body>
<?php require_once __DIR__ . '/../../views/layouts/footer.php'; ?>
