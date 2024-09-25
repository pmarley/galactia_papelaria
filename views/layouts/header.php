<?php 
    $year = new DateTime('now');
    $allRights = $year->format('Y').' All rights reserved <b>P7CONSULTORIA</b>';
    $cssPath =  "/galactia_papelaria/public/assets/styles.css";
    $faviconPath = "/galactia_papelaria/public/assets/favicon/";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?=$cssPath?>>
    <link rel="apple-touch-icon" sizes="180x180" href=<?=$faviconPath."/apple-touch-icon.png";?>>
    <link rel="icon" type="image/png" sizes="32x32" href=<?=$faviconPath."/favicon-32x32.png";?>>
    <link rel="icon" type="image/png" sizes="16x16" href=<?=$faviconPath."/favicon-16x16.png";?>>
    <link rel="manifest" href=<?=$faviconPath."/site.webmanifest"?>>
    <title><?php echo $title ?? 'Meu Sistema'; ?></title>
</head>
<body>
    <header class="container">
        <nav class="flex justify-c">
            <a href="/galactia_papelaria/public/index.php">Home</a>
            
            <a href="/galactia_papelaria/views/product/index.php">Produtos</a>
            <a href="/galactia_papelaria/views/customer/index.php">Clientes</a>
            <a href="/galactia_papelaria/views/order/index.php">Pedidos</a>
        </nav>
    </header>
    <div class="container" id="main-content">


            
