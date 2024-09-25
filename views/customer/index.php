<?php
require_once __DIR__ . '/../../controllers/customer_controller.php';

$title = "Clientes";
require_once __DIR__ . '/../../views/layouts/header.php';

$customerController = new CustomerController(); // Corrigido
$customers = $customerController->getAllCustomers();
?>
<h1><?=$title?></h1>
<div class="flex justify-c margin-b">
    <a href="create.php" class="btn justify-c">Novo Cliente</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>Nome do Cliente</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Endereço</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td>
                    <a href="edit.php?customer_id=<?php echo htmlspecialchars($customer['customer_id']); ?>" class="btn">Editar</a>
                    <!-- <a href="delete.php?customer_id=<?php echo htmlspecialchars($customer['customer_id']); ?>" class="btn delete">Deletar</a> -->
                </td>
                <td><?php echo htmlspecialchars($customer['name']); ?></td>
                <td><?php echo htmlspecialchars($customer['email']); ?></td>
                <td><?php echo htmlspecialchars($customer['phone']); ?></td>
                <td><?php echo htmlspecialchars($customer['address']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once __DIR__ . '/../../views/layouts/footer.php'; ?>
