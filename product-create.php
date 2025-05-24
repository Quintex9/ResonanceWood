<?php
require_once '_inc/classes/Database.php';
require_once 'Product.php';

$db = new Database();
$conn = $db->getConnection();
$productObj = new Product($conn);

$woodTypesStmt = $conn->query("SELECT * FROM wood_types");
$woodTypes = $woodTypesStmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'name' => $_POST['name'] ?? '',
        'price' => $_POST['price'] ?? 0,
        'image' => $_POST['image'] ?? '',
        'wood_type_id' => $_POST['wood_type_id'] ?? 0,
        'rok' => $_POST['rok'] ?? 0
    ];

    if ($productObj->create($data)) {
        header("Location: admin.php");
        exit;
    } else {
        echo "<p>Chyba pri vytváraní produktu.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pridať produkt</title>
    <style>
        body {
            background: #f5f1e7 url('Images/black.jpg') repeat;
            font-family: 'Segoe UI', sans-serif;
            color: #3e2c1c;
            padding: 40px;
        }

        h1 {
            text-align: center;
            color: #5c3d26;
            text-shadow: 1px 1px 0 #fff;
            margin-bottom: 30px;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background: #fff9f1;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(60, 40, 20, 0.2);
            border: 1px solid #c8b69e;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #c5b59a;
            border-radius: 5px;
            background: #fffdf9;
            font-size: 15px;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #8b5e3c;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #704527;
        }

        a {
            color: #7b4e2d;
            margin-left: 15px;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<h1>Pridať nový produkt</h1>
<form method="post">
    <label>Názov:<br>
        <input type="text" name="name" required>
    </label><br><br>

    <label>Cena (€):<br>
        <input type="number" step="0.01" name="price" required>
    </label><br><br>

    <label>Obrázok (URL):<br>
        <input type="text" name="image">
    </label><br><br>

    <label>Druh dreva:<br>
        <select name="wood_type_id" required>
            <option value="">-- Vyber typ dreva --</option>
            <?php foreach ($woodTypes as $type): ?>
                <option value="<?= $type['id'] ?>"><?= htmlspecialchars($type['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </label><br><br>

    <label>Rok výroby:<br>
        <input type="number" name="rok" required>
    </label><br><br>

    <button type="submit">Pridať produkt</button>
    <a href="admin.php">Zrušiť</a>
</form>
</body>
</html>
