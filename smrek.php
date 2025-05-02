<?php
include("partials/header.php");
require_once("_inc/classes/Database.php");

$db = new Database();
$conn = $db->getConnection();
$woodType = 1;

$stmt = $conn->prepare("SELECT * FROM products WHERE wood_type_id = ?"); //? je placeholder, obrana voči injekcii
$stmt->execute([$woodType]); //bezpečne vloženie
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
            foreach ($products as $item) {
                echo '<div class="product-card">';
                echo '<div class="product-image">';
                echo '<img src="' . $item['image'] . '" alt="' . $item['name'] . '">';
                echo '</div>';
                echo '<div class="product-info">';
                echo '<div class="product-category">'. $item['price'] . "€" . '</div>';
                echo '<h2 class="product-title">' . $item['name'] . '</h2>';
                echo '<p>' . "Rok výroby: ". $item['rok'] . '</p>';
                echo '<button class="product-inquiry">Spýtať sa na tovar</button>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </main>

<?php
include("partials/footer.php");
