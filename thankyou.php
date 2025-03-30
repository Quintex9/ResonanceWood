<?php
include("partials/header.php");
?>

    <main>
        <section class="container" style="display: flex; justify-content: center; align-items: center; min-height: 50vh;">
            <div class="row" style="text-align: center; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 600px;">
                <div class="col-100 text-center">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $contact_name = $_POST['meno'];

                        if (empty($contact_name)) {
                            echo "";
                        } else{
                            echo "<h2>$contact_name ďakujem za vyplnenie formulára</h2>";
                        }
                    }
                    ?>
                </div>
            </div>
        </section>


    </main>

<style>body{background-image: url("Images/black.jpg")}</style>
<?php
include("partials/footer.php");
?>