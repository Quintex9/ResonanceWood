<?php
include("partials/header.php");
?>
    <main>
        <div class="contact-container">
            <h2>Kontaktujte nás</h2>
            <form id="contact" action="thankyou.php" method="POST">
                <div class="form-group">
                    <label for="name">Meno:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="phone">Telefónne číslo:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Správa:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" value="Odoslať" class="submit-button">Odoslať</button>
            </form>
        </div>
    </main>

    <style>
        body{
            background-image: url("Images/black.jpg");
        }
        .contact-container {
            background: #ffffff;
            padding: 20px;
            max-width: 500px;
            margin: 40px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            color: #5e4534;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .submit-button {
            background-color: #805f46;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .submit-button:hover {
            background-color: #956b3e;
        }
    </style>

<?php include("partials/footer.php"); ?>