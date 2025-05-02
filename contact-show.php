<?php
include('partials/header.php');
$db = new Database();
$contact = new Contact($db);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $contactData = $contact->show($id);
}

?>
<style>
    body{
        background-color: #cca780;
    }
    section{
        padding: 100px;
    }
</style>

    <section class="container">
        <h1>Contact show</h1>
        <p>Name: <?php echo($contactData['name']);?></p>
        <p>Phone: <?php echo($contactData['phone']);?></p>
        <p>Email: <?php echo($contactData['email']);?></p>
        <p>Message: <?php echo($contactData['message']);?></p>
        <a href="admin.php">Back to Contacts</a>
    </section>

<?php
include('partials/footer.php');
?>