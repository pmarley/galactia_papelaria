<?php
require_once __DIR__ . '/../../controllers/client_controller.php';

$title = "Cadastrar Cliente";
require_once __DIR__ . '/../../views/layouts/header.php';
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clientController = new ClientController();
    $clientController->createClient([
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address']
    ]);
    header("Location: index.php");
}
?>
    <h1>Cadastrar Novo Cliente</h1>
        <form action="create.php" method="POST">
            <div class="form-btn">
                <button type="submit" class="btn">Cadastrar</button>
            </div>
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email">
            </div>

            <div class="form-group">
                <label for="phone">Telefone:</label>
                <input type="number" name="phone" required>
            </div>

            <div class="form-group">
                <label for="address">Endereço:</label>
                <input type="text" name="address">
            </div>
        </form>
        <a href="index.php" class="btn">Voltar</a>
<?php require_once __DIR__ . '/../../views/layouts/footer.php'; ?>
