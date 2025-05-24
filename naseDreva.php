<?php include("partials/header.php"); include("_inc/classes/wood.php")?>
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
    .banner {
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .banner:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }
</style>

<main class="main-content">
    <?php
    $dreva = new wood();
    $drevaItems = $dreva->getWoodTypes();
    foreach ($drevaItems as $item) {
        echo '<a href="' . $item['link'] . '" class="banner-link">';
        echo '<div class="banner" style="background-image: url(\'' . $item['image'] . '\');">';
        echo '<div class="banner-text">';
        echo '<h2>' . $item['name'] . '</h2>';
        echo '<p>' . $item['description'] . '</p>';
        echo '</div></div></a>';
    }
    ?>
</main>
<?php
include("partials/footer.php");
?>
