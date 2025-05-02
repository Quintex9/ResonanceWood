<?php
include("partials/header.php");

$db = new Database();
$auth = new Authenticate($db);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"]??"";
    $password = $_POST["password"]??"";

    $result = $auth->register($email, $password);

    if($result === true){ //== nefungovalo, opýtať sa na hodine :(
        header("location: login.php");
        exit();
    } else{
        $error = $result;
    }
}
?>
<style>
    body {
        font-family: 'Lora', serif;
        background-color: #f5f0ec;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 400px;
        margin: 80px auto;
        padding: 30px;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #5a3e2b;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 8px;
        color: #333;
        font-weight: bold;
    }

    input[type="email"],
    input[type="password"] {
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
    }

    button[type="submit"] {
        padding: 12px;
        background-color: #8b5e3c;
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #6e442b;
    }

    div[style="color:red;"] {
        margin-bottom: 15px;
        text-align: center;
        font-weight: bold;
    }

</style>
<section class="container">
    <h2>Registrácia</h2>
    <?php if (isset($error)): ?>
        <div style="color:red;"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <form method="POST" >
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Heslo:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Zaregistrovať sa</button>
    </form>
</section>

<?php
include("partials/footer.php");
?>
