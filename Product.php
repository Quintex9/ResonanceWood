<?php
class Product
{
    private $conn;

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    // Získa produkty podľa typu dreva
    public function getProductsByWoodType($woodType)
    {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE wood_type_id = ?");
        $stmt->execute([$woodType]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Zobrazí produktový card
    public function renderProductCard($product)
    {
        echo '<div class="product-card">';
        echo '<div class="product-image">';
        echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '">';
        echo '</div>';
        echo '<div class="product-info">';
        echo '<div class="product-category">' . $product['price'] . "€" . '</div>';
        echo '<h2 class="product-title">' . $product['name'] . '</h2>';
        echo '<p>' . "Rok výroby: " . $product['rok'] . '</p>'; // Pridaný rok výroby
        echo '<button class="product-inquiry" onclick="openInquiryForm(' . $product['id'] . ', \'' . addslashes($product['name']) . '\', \'' . $product['price'] . '\')">Spýtať sa na tovar</button>';
        echo '</div>';
        echo '</div>';
    }

    // Zobrazí celú mriežku produktov
    public function renderProductGrid($woodType)
    {
        $products = $this->getProductsByWoodType($woodType);
        echo '<div class="product-grid">';
        foreach ($products as $product) {
            $this->renderProductCard($product);
        }
        echo '</div>';
    }

    // Zobrazí HTML pre modálne okno
    public function renderModal()
    {
        echo '
        <div id="inquiryModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeInquiryForm()">&times;</span>
                <h2>Spýtať sa na tovar</h2>
                <form action="submit_inquiry.php" method="POST">
                    <input type="hidden" name="product_id" id="product_id">
                    <label for="first_name">Meno:</label>
                    <input type="text" name="first_name" id="first_name" required>
                    <label for="last_name">Priezvisko:</label>
                    <input type="text" name="last_name" id="last_name" required>
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" required>
                    <label for="phone">Telefón:</label>
                    <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" placeholder="0123456789" required>
                    <label for="question">Tvoja otázka:</label>
                    <textarea name="question" id="question" required></textarea>
                    <input type="hidden" name="product_name" id="product_name">
                    <input type="hidden" name="product_price" id="product_price">
                    <button type="submit">Odoslať</button>
                </form>
            </div>
        </div>';
    }
}
?>

<script>
    function openInquiryForm(id, name, price) {
        document.getElementById('product_name').value = name;
        document.getElementById('product_price').value = price;
        document.getElementById('inquiryModal').style.display = "block";
    }


    function closeInquiryForm() {
        document.getElementById('inquiryModal').style.display = "none";
    }

    // Zatvorenie modálu klikom mimo okna
    window.onclick = function(event) {
        const modal = document.getElementById('inquiryModal');
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
</script>

