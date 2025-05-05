<?php
include("partials/header.php"); include("partials/wood.php");
require_once("_inc/classes/Database.php");

$db = new Database();
$auth = new Authenticate($db);
$auth->reguireLogin();

?>
    <style>
        body {
            font-family: 'Lora', serif;
            background-image: url('Images/Wood-Wallpaper-1920x1080-64194.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat; /* ZABRÁNI OPAKOVANIU */
            color: #333;
        }
    </style>

    <main class="main-content">
        <div class="product-grid">
            <?php
            $db = new Database();
            $products = new wood();
            $productsItems = $products->getNastroje();
            foreach ($productsItems as $item) {
                echo '<div class="product-card2">';
                echo '<div class="product-image2">';
                echo '<img src="' . $item['image'] . '" alt="' . $item['name'] . '">';
                echo '</div>';
                echo '<div class="product-info">';
                echo '<div class="product-category">'. $item['price'] . "€" . '</div>';
                echo '<h2 class="product-title">' . $item['name'] . '</h2>';
                echo '<p>' . $item['description'] . '</p>';
                echo '<button class="product-inquiry">Spýtať sa na tovar</button>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </main>

<?php
include("partials/footer.php");
