<?php
include("partials/header.php");
require_once("_inc/classes/Database.php");
require_once("Product.php");

$db = new Database();
$conn = $db->getConnection();
$woodType = 4;

$productHandler = new Product($conn);
?>

<style>
    body {
        font-family: 'Lora', serif;
        background-image: url('Images/Wood-Wallpaper-1920x1080-64194.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        background-repeat: no-repeat;
        color: #333;
    }
</style>

<main class="main-content">
    <?php
    $productHandler->renderProductGrid($woodType);

    $productHandler->renderModal();
    ?>
</main>

<?php
include("partials/footer.php");
?>
