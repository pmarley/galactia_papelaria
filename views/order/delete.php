<?php
    require_once __DIR__ . '/../../controllers/order_controller.php';
    
    $title = "Deletar Pedido";
    require_once __DIR__ . '/../../views/layouts/header.php';
    
    if (!isset($_GET['order_id'])) {
        header('Location: index.php');
        exit();
    }
    
    $orderController = new OrderController();
    $order = $orderController->getOrderById($_GET['order_id']);
    if (!$order) {
        header("Location: index.php");
        exit();
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $deleted = $orderController->deleteOrder($_POST['order_id']);
        if ($deleted) {
            header('Location: index.php');
            exit();
        }
    }
    ?>
    
    <h1><?=$title?></h1>
    <p>Tem certeza que deseja deletar o pedido <strong><?php echo htmlspecialchars($order['order_name']); ?></strong>?</p>
    <form action="delete.php?order_id=<?php echo htmlspecialchars($order['order_id']); ?>" method="POST">
        <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($order['order_id']); ?>">
        <button type="submit" class="btn">Deletar</button>
        <a href="index.php" class="btn">Cancelar</a>
    </form>
    <?php require_once __DIR__ . '/../../views/layouts/footer.php'; ?>
    