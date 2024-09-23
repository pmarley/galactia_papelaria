<?php
    require_once ('../controllers/product_controller.php');
    require_once ('../controllers/stock_controller.php');

    $productController = new ProductController();
    // $stockController = new StockController();

    $products = $productController->getAllProducts();
    // $stocks = $stockController->getAllStocks();

    foreach ($products as $p) {
        echo '<p>'.'Product Name: '.$p['name'].'</p>';
    }
    // include ('../views/index.php');  // Mostrará o index.php com as listas dos produtos e materiais

    // $productController->deleteProduct(1); // Excluirá o produto com id 1
    // $stockController->deleteStock(1); // Excluirá o material com id 1
    // $productController->updateProduct(1, 'Novo nome', 'Nova descrição', 10, 50); // Atualizará o produto com id 1
    // $stockController->updateStock(1, 'Novo nome', 'Nova descrição', 10, 50); // Atualizará o material com id 1

    // $productController->createProduct('Novo produto', 'Nova
    
?>