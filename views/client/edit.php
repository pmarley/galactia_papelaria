<?php
require_once __DIR__ . '/../../controllers/client_controller.php';

$title = "Editar Clientes";
require_once __DIR__ . '/../../views/layouts/header.php';

if (!isset($_GET['client_id'])) {
    header('Location: index.php');
    exit();
}

$clientController = new ClientController();
$client_id = htmlspecialchars($_GET['client_id']); // Sanitiza o valor de 'client_id'

$client = $clientController->getClientById($client_id);

if (!$client) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updated = $clientController->updateClient([
        'client_id' => htmlspecialchars($_POST['client_id']),
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

<h1>Editar Clientes</h1>
<form action="edit.php?client_id=<?php echo htmlspecialchars($client['client_id']); ?>" method="POST">
    <div class="flex justify-c">
        <button type="submit" class="btn">Atualizar</button>
        <a class="btn delete" href="delete.php?client_id=<?php echo htmlspecialchars($client['client_id']); ?>">Deletar</a>
    </div>

    <input type="hidden" name="client_id" value="<?php echo htmlspecialchars($client['client_id']); ?>">

    <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($client['name']); ?>" required>
    </div>

    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($client['email']); ?>">
    </div>

    <div class="form-group">
        <label for="phone">Telefone:</label>
        <input type="number" name="phone" value="<?php echo htmlspecialchars($client['phone']); ?>" required>
    </div>

    <div class="form-group">
        <label for="address">Endereço:</label>
        <input type="text" name="address" value="<?php echo htmlspecialchars($client['address']); ?>">
    </div>
</form>

<a href="index.php" class="btn">Voltar</a>

<?php require_once __DIR__ . '/../../views/layouts/footer.php'; ?>
