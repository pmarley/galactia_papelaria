<?php 
    $year = new DateTime('now');
    $allRights = $year->format('Y').' All rights reserved <b>P7CONSULTORIA</b>';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/newCRUD_php/public/assets/styles.css">
    <title><?php echo $title ?? 'Meu Sistema'; ?></title>
</head>
<body>
    <header class="container">
        <nav>
            <a href="/newCRUD_php/views/product/index.php">Produtos</a>
            <a href="/newCRUD_php/views/estoque/index.php">Estoque</a>
        </nav>
    </header>
    <div class="container">
