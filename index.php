<?php
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
            margin-top: 20px;
        }
    </style>
</head>
<body>
<header>
    <h1>ResonanceWood</h1>
    <p>Objavte krásu a históriu dreva, ktoré formuje hudbu</p>
</header>

<nav>
    <a href="#">Domov</a>
    <a href="#">Naše drevá</a>
    <a href="#">Nástroje</a>
    <a href="#">Kontaktujte nás</a>
</nav>

<div class="content">
    <div class="left-panel"></div>
    <div class="right-panel">
        <h1>ResonanceWood</h1>
        <p>ResonanceWood je špecializovaný dodávateľ kvalitného dreva pre výrobu hudobných nástrojov. Naše produkty sú starostlivo vyberané s dôrazom na akustické vlastnosti a dlhú životnosť. Spolupracujeme s poprednými výrobcami, ktorí oceňujú precíznosť spracovania a výnimočné rezonančné vlastnosti našich materiálov. Drevo pochádza z udržateľne obhospodarovaných lesov, čím zabezpečujeme ekologický prístup k výrobe. Či už ide o smrek, javor alebo eben, naše drevo poskytuje hudobným nástrojom jedinečný tón a charakter.</p>
        <div class="map">
            <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2436.885071412935!2d13.41053!3d52.520645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTLCsDMxJzEwLjMiTiAxM8KwMjQnMzcuOSJF!5e0!3m2!1ssk!2ssk!4v1617887436196!5m2!1ssk!2ssk"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </div>
</div>

<footer>
    <p>&copy; 2025 Hudobné Drevo | Všetky práva vyhradené</p>
</footer>
</body>
</html>
