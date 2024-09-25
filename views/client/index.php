<?php
require_once __DIR__ . '/../../controllers/client_controller.php';

$title = "Clientes";
require_once __DIR__ . '/../../views/layouts/header.php';

$clientController = new ClientController();
$clients = $clientController->getAllClients();
?>
    <h1>Clientes</h1>
        <div class="flex justify-c">
            <a href="create.php" class="btn justify-c">Novo Cliente</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Ações</th>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client): ?>
                    <tr>
                        <td>
                            <a href="edit.php?client_id=<?php echo $client['client_id']; ?>" class="btn">Editar</a>
                        </td>
                        <td><?php echo $client['client_id']; ?></td>
                        <td><?php echo htmlspecialchars($client['name']); ?></td>
                        <td><?php echo htmlspecialchars($client['email']); ?></td>
                        <td><?php echo htmlspecialchars($client['phone']); ?></td>
                        <td><?php echo htmlspecialchars($client['address']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
<?php require_once __DIR__ . '/../../views/layouts/footer.php'; ?>
