<?php
require_once __DIR__ . '/../../controllers/customer_controller.php';

$title = "Editar Clientes";
require_once __DIR__ . '/../../views/layouts/header.php';

if (!isset($_GET['customer_id'])) {
    header('Location: index.php');
    exit();
}

$customerController = new CustomerController(); // Corrigido
$customer_id = htmlspecialchars($_GET['customer_id']); // Sanitiza o valor de 'customer_id'

$customer = $customerController->getCustomerById($customer_id);

if (!$customer) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updated = $customerController->updateCustomer([
        'customer_id' => htmlspecialchars($_POST['customer_id']),
        'name' => htmlspecialchars($_POST['name']),
        'email' => htmlspecialchars($_POST['email']),
        'phone' => htmlspecialchars($_POST['phone']),
        'address' => htmlspecialchars($_POST['address'])
    ]);

    if ($updated) {
        header('Location: index.php');
        exit();
    }
}
?>

<h1><?=$title;?></h1>
<form action="edit.php?customer_id=<?php echo htmlspecialchars($customer['customer_id']); ?>" method="POST">
    <div class="flex justify-c">
        <button type="submit" class="btn">Atualizar</button>
        <a class="btn delete" href="delete.php?customer_id=<?php echo htmlspecialchars($customer['customer_id']); ?>">Deletar</a>
    </div>

    <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($customer['customer_id']); ?>">

    <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($customer['name']); ?>" required>
    </div>

    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($customer['email']); ?>">
    </div>

    <div class="form-group">
        <label for="phone">Telefone:</label>
        <input type="number" name="phone" value="<?php echo htmlspecialchars($customer['phone']); ?>" required>
    </div>

    <div class="form-group">
        <label for="address">Endereço:</label>
        <input type="text" name="address" value="<?php echo htmlspecialchars($customer['address']); ?>">
    </div>
</form>

<a href="index.php" class="btn">Voltar</a>

<?php require_once __DIR__ . '/../../views/layouts/footer.php'; ?>
