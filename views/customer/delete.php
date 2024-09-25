<?php
require_once __DIR__ . '/../../controllers/customer_controller.php';

$title = "Deletar Cliente"; // Corrigido
require_once __DIR__ . '/../../views/layouts/header.php';

if (!isset($_GET['customer_id'])) {
    header('Location: index.php');
    exit();
}

$customerController = new CustomerController(); // Corrigido
$customer_id = htmlspecialchars($_GET['customer_id']); 
$customer = $customerController->getCustomerById($customer_id); // Corrigido

if (!$customer) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = htmlspecialchars($_POST['customer_id']); 
    $deleted = $customerController->deleteCustomer($customer_id);
    
    if ($deleted) {
        header('Location: index.php');
        exit();
    }
}
?>

<h1>Deletar Cliente</h1>
<p>Tem certeza que deseja deletar o cliente <strong><?php echo htmlspecialchars($customer['name']); ?></strong>?</p>

<form action="delete.php?customer_id=<?php echo htmlspecialchars($customer['customer_id']); ?>" method="POST">
    <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($customer['customer_id']); ?>">
    <button type="submit" class="btn">Deletar</button>
    <a href="index.php" class="btn">Cancelar</a>
</form>

<?php require_once __DIR__ . '/../../views/layouts/footer.php'; ?>
