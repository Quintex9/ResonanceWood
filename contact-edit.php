<?php
include('partials/header.php');
$db = new Database();
$contact = new Contact($db);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $contactData = $contact->show($id);
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        if ($contact->edit($id,$name,$phone, $email, $message)) {
            header("Location: admin.php");
            exit;
        } else {
            echo "Error editing contact.";
        }
    }
}

?>
<style>
    body{
        background-color: #cca780;
    }
    section{
        padding: 100px;
        flex-direction: column;
    }
</style>

    <section class="container">
        <h1>Update contact</h1>
        <form id="contact" action="" method="POST">
            <input type="text" id ="name" name="name" value="<?php echo($contactData['name']);?>" required><br>
            <input type="text" id="phone" name="phone" value="<?php echo($contactData['phone']);?>"required><br>
            <input type="email" id="email" name="email" value="<?php echo($contactData['email']);?>"required><br>
            <textarea id="message" name="message"><?php echo($contactData['message']);?></textarea><br>
            <input type="submit" value="Odoslať">
        </form>
    </section>

<?php
include('partials/footer.php');
?>