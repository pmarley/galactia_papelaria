<?php 
require_once __DIR__ . '/../../controllers/order_controller.php';

if (!isset($_GET['customer_id'])) {
    echo "<p>Cliente não especificado.</p>";
    require_once __DIR__ . '/../../views/layouts/footer.php';
    exit();
}
$customer_id = $_GET['customer_id'];

$orderController = new OrderController();
$orders = $orderController->getOrdersByCustomerId($customer_id);

$customerName = $orderController->getCustomerNamesByCustomerId($customer_id);
$title = $customerName;
require_once __DIR__ . '/../../views/layouts/header.php';

$total = 0;

?>
<h1><?=$title;?></h1>
<div class="flex justify-c">
    <a href="create.php" class="btn justify-c">Novo Pedido</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>Nome do Pedido</th>
            <th>Valor</th>
            <th>Custo</th>
            <th>Lucro</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($orders)): ?>
            <tr>
                <td colspan="5">Nenhum pedido encontrado para este cliente.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($orders as $order): 
                $total += $order['profit'];
            ?>
                <tr>
                    <td>
                        <a href="edit.php?order_id=<?php echo $order['order_id']; ?>" class="btn">Editar</a>
                    </td>
                    <td><?php echo htmlspecialchars($order['order_name']); ?></td>
                    <td><?php echo htmlspecialchars($order['price']); ?></td>
                    <td><?php echo htmlspecialchars($order['cost']); ?></td>
                    <td><?php echo htmlspecialchars($order['profit']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<div id="total" class="flex justify-c ">
    <span>Total: <?= htmlspecialchars($total); ?></span>
</div>
<a href="index.php" class="btn margin-t">Voltar</a>

<?php require_once __DIR__ . '/../../views/layouts/footer.php'; ?>
