<?php
require_once("_inc/classes/Database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $conn = $db->getConnection();

    $productName = htmlspecialchars($_POST['product_name']);
    $productPrice = htmlspecialchars($_POST['product_price']);
    $firstName = htmlspecialchars($_POST['first_name']);
    $lastName = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $question = htmlspecialchars($_POST['question']);

    $stmt = $conn->prepare("
        INSERT INTO inquiries (product_name, product_price, first_name, last_name, email, phone, question)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

    try {
        $stmt->execute([$productName, $productPrice, $firstName, $lastName, $email, $phone, $question]);

        header("Location: javor.php?inquiry=success");
        exit;
    } catch (PDOException $e) {
        echo "Chyba pri ukladaní dopytu: " . $e->getMessage();
    }
}
?>
