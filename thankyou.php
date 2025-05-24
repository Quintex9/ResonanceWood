<?php
include("partials/header.php");
?>

<main>
    <section class="container" style="display: flex; justify-content: center; align-items: center; min-height: 50vh;">
        <div class="row" style="text-align: center; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 600px;">
            <div class="col-100 text-center">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $db = new Database();
                    $contact = new Contact($db);
                    $contact_name = $_POST['name'];
                    $contact_phone = $_POST['phone'];
                    $contact_email = $_POST['email'];
                    $contact_message = $_POST['message'];

                    $contact->create($contact_name, $contact_phone, $contact_email, $contact_message);

                    if (!empty($contact_name)) {
                        echo "<h2>" . htmlspecialchars($contact_name) . " ďakujem za vyplnenie formulára</h2>";
                    }
                }
                ?>
            </div>
        </div>
    </section>
</main>

<style>
    body {
        background-image: url("Images/black.jpg");
    }
</style>

<?php
include("partials/footer.php");
?>
