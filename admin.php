<?php
include("partials/header.php");
include("_inc/classes/Inquiry.php");

$db = new Database();
$auth = new Authenticate($db);
$auth->reguireLogin();
$inquiry = new Inquiry($db);
$inquiries = $inquiry->index(); // Metóda v triede Inquiry, ktorá vráti všetky dopyty


$userRole = $auth->getUserRole();
if($userRole == 0) {
    $contact = new Contact($db);$contacts = $contact->index();
    $user = new User($db);$users = $user->index();

    if (isset($_GET['delete'])) {
        $contact->destroy($_GET['delete']);
        header("Location: admin.php");
        exit;
    }
        if (isset($_GET['delete_user'])) {
            $user->destroy($_GET['delete_user']);
            header("Location: admin.php");
            exit;
        }
} else{
    header("Location: index.php");
    exit();
}
?>
<style>
    body{
        background-color: #cca780;
    }
    section{
        padding: 100px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-family: 'Segoe UI', sans-serif;
        background-color: #fff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        border-radius: 8px;
        overflow: hidden;
    }

    th, td {
        padding: 12px 16px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #8b5e3c;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    tr:nth-child(even) {
        background-color: #f9f4ef;
    }

    tr:hover {
        background-color: #f0e3d0;
        transition: background-color 0.3s ease;
    }

    table a.button, table a {
        padding: 6px 12px;
        margin: 0 4px;
        background-color: #8b5e3c;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 0.9em;
        transition: background-color 0.2s ease;
    }

    /* Tlačítka v tabuľkách po hover */
    table a.button:hover, table a:hover {
        background-color: #704929;
    }

</style>

<section class="container">
    <h1>Vítaj admin</h1>

    <!-- Sekcia kontaktov -->
    <h2>Kontakty</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Meno</th>
            <th>Telefón</th>
            <th>Email</th>
            <th>Správa</th>
            <th>Delete</th>
            <th>Edit</th>
            <th>Show</th>
        </tr>
        <?php foreach($contacts as $con): ?>
            <tr>
                <td><?= htmlspecialchars($con['id']) ?></td>
                <td><?= htmlspecialchars($con['name']) ?></td>
                <td><?= htmlspecialchars($con['phone']) ?></td>
                <td><?= htmlspecialchars($con['email']) ?></td>
                <td><?= htmlspecialchars($con['message']) ?></td>
                <td><a href="?delete=<?= $con['id'] ?>" onclick="return confirm('Určite chcete vymazať túto správu?')">Delete</a></td>
                <td><a href="contact-edit.php?id=<?= $con['id'] ?>">Edit</a></td>
                <td><a href="contact-show.php?id=<?= $con['id'] ?>">Show</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <hr>
    <?php if ($userRole == 0): ?>
        <!-- Sekcia používateľov -->
        <h2>Používatelia</h2>
        <a href="user-create.php" class="button">Create User</a>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Meno</th>
                <th>Email</th>
                <th>Role</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>Show</th>
            </tr>
            <?php foreach($users as $u): ?>
                <tr>
                    <td><?= htmlspecialchars($u['id']) ?></td>
                    <td><?= htmlspecialchars($u['name']) ?></td>
                    <td><?= htmlspecialchars($u['email']) ?></td>
                    <td><?= htmlspecialchars($u['role']) ?></td>
                    <td><a href="?delete_user=<?= $u['id'] ?>" onclick="return confirm('Určite chcete vymazať tohto používateľa?')">Delete</a></td>
                    <td><a href="user-edit.php?id=<?= $u['id'] ?>">Edit</a></td>
                    <td><a href="user-show.php?id=<?= $u['id'] ?>">Show</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <h2>Dopyty na produkty</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Meno</th>
            <th>Priezvisko</th>
            <th>Email</th>
            <th>Telefón</th>
            <th>Otázka</th>
            <th>Produkt</th>
            <th>Cena</th>
            <th>Delete</th>
        </tr>
        <?php foreach($inquiries as $inq): ?>
            <tr>
                <td><?= htmlspecialchars($inq['id']) ?></td>
                <td><?= htmlspecialchars($inq['first_name']) ?></td>
                <td><?= htmlspecialchars($inq['last_name']) ?></td>
                <td><?= htmlspecialchars($inq['email']) ?></td>
                <td><?= htmlspecialchars($inq['phone']) ?></td>
                <td><?= htmlspecialchars($inq['question']) ?></td>
                <td><?= htmlspecialchars($inq['product_name']) ?></td>
                <td><?= htmlspecialchars($inq['product_price']) ?> €</td>
                <td><a href="?delete_inquiry=<?= $inq['id'] ?>" onclick="return confirm('Naozaj zmazať dopyt?')">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>


</section>


<?php
include("partials/footer.php");
?>
