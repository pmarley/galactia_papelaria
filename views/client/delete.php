<?php
require_once __DIR__ . '/../../controllers/client_controller.php';

$title = "Deletar Cliente";
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
    $client_id = htmlspecialchars($_POST['client_id']); // Sanitiza o valor de 'client_id' do POST
    $deleted = $clientController->deleteClient($client_id);
    
    if ($deleted) {
        header('Location: index.php');
        exit();
    }
}
?>

<h1>Deletar Cliente</h1>
<p>Tem certeza que deseja deletar o cliente <strong><?php echo htmlspecialchars($client['name']); ?></strong>?</p>

<form action="delete.php?client_id=<?php echo htmlspecialchars($client['client_id']); ?>" method="POST">
    <input type="hidden" name="client_id" value="<?php echo htmlspecialchars($client['client_id']); ?>">
    <button type="submit" class="btn">Deletar</button>
    <a href="index.php" class="btn">Cancelar</a>
</form>

<?php require_once __DIR__ . '/../../views/layouts/footer.php'; ?>
