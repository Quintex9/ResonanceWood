<?php

function get_menu(array $pages){
    $menuItems = '';
    foreach($pages as $page_name => $page_url){
        //Pre každú stránku príde odkaz do navigačného memu
        $menuItems .= '<li><a href="'.$page_url.'">'.$page_name.'</a></li>'; // .= je spájanie stringov
    }
    // Vráti vygenerovaný HTML kód pre navigačné menu
    return $menuItems;
}
