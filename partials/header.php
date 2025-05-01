<?php require_once("_inc/autoload.php") ?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResonanceWood</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap" rel="stylesheet">

</head>
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