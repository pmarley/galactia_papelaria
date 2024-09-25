<?php 
require_once __DIR__ . '/../../controllers/order_controller.php';

$title = "Pedidos";
require_once __DIR__ . '/../../views/layouts/header.php';

$orderController = new OrderController();
$orders = $orderController->getAllOrders();

$total = 0;

?>
<h1>Pedidos</h1>
<div class="flex justify-c margin-b">
    <a href="create.php" class="btn justify-c">Novo Pedido</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th></th>
            <!-- <th>ID</th> -->
            <th>Nome do Pedido</th>
            <th>Valor</th>
            <th>Custo</th>
            <th>Lucro</th>
            <th>Cliente</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): 
            $total += $order['profit'];
        ?>
            <tr>
                <td>
                    <a href="edit.php?order_id=<?php echo $order['order_id']; ?>" class="btn">Editar</a>
                </td>
                <!-- <td><?php echo $order['order_id']; ?></td> -->
                <td><?php echo htmlspecialchars($order['order_name']); ?></td>
                <td><?php echo htmlspecialchars($order['price']); ?></td>
                <td><?php echo htmlspecialchars($order['cost']); ?></td>
                <td><?php echo htmlspecialchars($order['profit']); ?></td>
                <td><?php echo "<a href=order.php?customer_id=".htmlspecialchars($order['customer_id']).">".$orderController->getCustomerNamesByCustomerId($order['customer_id']);"</a>"; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div id="total" class="flex justify-c ">
    <span>Total: <?= htmlspecialchars($total); ?></span>
</div>


<?php require_once __DIR__ . '/../../views/layouts/footer.php'; ?>
