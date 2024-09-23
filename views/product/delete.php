<?php
require_once __DIR__ . '/../../controllers/product_controller.php';

$title = "Deletar Produto";
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
    $deleted = $productController->deleteProduct($_POST['id']);
    if ($deleted) {
        header('Location: index.php');
        exit();
    }
}
?>

<h1>Deletar Produto</h1>
<p>Tem certeza que deseja deletar o produto <strong><?php echo htmlspecialchars($product['name']); ?></strong>?</p>
<form action="delete.php?id=<?php echo htmlspecialchars($product['id']); ?>" method="POST">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
    <button type="submit" class="btn">Deletar</button>
    <a href="index.php" class="btn">Cancelar</a>
</form>
<?php require_once __DIR__ . '/../../views/layouts/footer.php'; ?>
