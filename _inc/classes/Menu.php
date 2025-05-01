<?php

class Menu {
    private $menuItems;

    public function __construct() {
        if (empty($menuItems)) {
            $menuItems = [
                ['label' => 'Domov', 'link' => 'index.php'],
                ['label' => 'Naše drevá', 'link' => 'naseDreva.php'],
                ['label' => 'Nástroje', 'link' => 'nastroje.php'],
                ['label' => 'Kontaktujte nás', 'link' => 'kontakt.php']
            ];
        }

        $this->menuItems = $menuItems;
    }
    public function getMenuItems() {
        return $this->menuItems;
    }
}
