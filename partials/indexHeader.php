<?php
require_once('_inc/autoload.php');
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResonanceWood</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            display: flex;
            flex: 1;
        }
        .left-panel {
            width: 33%;
            background: url('images/drevo.jpg') no-repeat center center/cover;
        }
        .right-panel {
            width: 67%;
            padding: 20px;
            background-color: #edd8c4;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .map {
            width: 100%;
            max-width: 600px;
            height: 400px;
            margin-top: 30px;
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
<header>
    <h1>ResonanceWood</h1>
    <p>Objavte krásu a históriu dreva, ktoré formuje hudbu</p>
</header>

<nav>
    <?php
    $menu = new Menu();
    $menuItems = $menu->getMenuItems();
    foreach ($menuItems as $item) {
        echo '<a href="' . $item['link'] . '">' . $item['label'] . '</a>';
    }
    ?>
</nav>