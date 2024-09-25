<?php
require_once __DIR__ . '/../../controllers/product_controller.php';

$title = "Editar Produtos";
require_once __DIR__ . '/../../views/layouts/header.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$productController = new ProductController();
$product = $productController->getProductById($_GET['id']);

if (!$product) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updated = $productController->updateProduct([
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'quantity' => $_POST['quantity']
    ]);
    if ($updated) {
        header('Location: index.php');
        exit();
    }
}
?>

<h1>Editar Produto</h1>
<form action="edit.php?id=<?php echo htmlspecialchars($product['id']); ?>" method="POST">
    <div class="flex justify-c">
        <button type="submit" class="btn">Atualizar</button>
        <a  class="btn delete"href="delete.php?id=<?php echo $product['id']; ?>">Deletar</a>
    </div>
    
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
    
    <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
    </div>

    <div class="form-group">
        <label for="description">Descrição:</label>
        <textarea name="description"><?php echo htmlspecialchars($product['description']); ?></textarea>
    </div>

    <div class="form-group">
        <label for="price">Preço:</label>
        <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>
    </div>

    <div class="form-group">
        <label for="quantity">Quantidade:</label>
        <input type="number" name="quantity" value="<?php echo htmlspecialchars($product['quantity']); ?>" required>
    </div>
</form>
<a href="index.php" class="btn">Voltar</a>
<?php require_once __DIR__ . '/../../views/layouts/footer.php'; ?>
