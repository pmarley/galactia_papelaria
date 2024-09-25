<?php 
    $year = new DateTime('now');
    $allRights = $year->format('Y').' All rights reserved <b>P7CONSULTORIA</b>';
    $cssPath =  "/galactia_papelaria/public/assets/styles.css";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?=$cssPath?>>
    <title><?php echo $title ?? 'Meu Sistema'; ?></title>
</head>
<body>
    <header class="container">
        <nav class="flex justify-c">
            <a href="/galactia_papelaria/public/index.php">Home</a>
            
            <a href="/galactia_papelaria/views/product/index.php">Produtos</a>
            <a href="/galactia_papelaria/views/client/index.php">Clientes</a>
            <a href="/galactia_papelaria/views/order/index.php">Pedidos</a>
        </nav>
    </header>
    <div class="container" id="main-content">


            
