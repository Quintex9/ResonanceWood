<?php include("_inc/functions.php") ?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResonanceWood</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>
<header>
    <h1>ResonanceWood</h1>
    <p>Objavte krásu a históriu dreva, ktoré formuje hudbu</p>
</header>

<nav>
    <?php
    $pages = array("Domov" => "index.php",
        "Naše drevá" => "naseDreva.php",
        "Nástroje" => "nastroje.php",
        "Kontaktuje nás" => "kontakt.php",
    );
    echo(get_menu($pages));
    ?>
</nav>