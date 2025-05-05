<?php
include('partials/header.php');

$db = new Database();
$user = new User($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $userData = $user->show($id);
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
    <h1>Detail používateľa</h1>
    <?php if ($userData): ?>
        <p>Meno: <?= htmlspecialchars($userData['name']) ?></p>
        <p>Email: <?= htmlspecialchars($userData['email']) ?></p>
        <p>Rola: <?= $userData['role'] == 0 ? 'Admin' : 'User' ?></p>
        <a href="admin.php">Späť na zoznam používateľov</a>
    <?php else: ?>
        <p>Používateľ nebol nájdený.</p>
        <a href="admin.php">Späť na zoznam používateľov</a>
    <?php endif; ?>
</section>

<?php
include('partials/footer.php');
?>
