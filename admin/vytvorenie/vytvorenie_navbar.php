<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Navbar\Navbar;
$navbar = new Navbar();
?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try{
        $nazov = $_POST['nazov'];
        $url = $_POST['url'];
        if (empty($nazov) || empty($url)) {
            die("Vyplňte polia označené hviezdičkou");
        } else {
            $navbar->vytvorenieZaznamu($nazov, $url);
        }

    }catch(Exception $e){
        die("Nastala chyba: " . $e -> getMessage());
    }
}
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/navbar.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/sidebar.php'; ?>

<div class = "vytvorenie_otazky_a_odpovede">
    <form action="" method = "POST" class = "vytvorenie_otazky_a_odpovede_forma">
        <label for="nazov">*Názov:</label>
        <input type="text" id = "nazov" name = "nazov">
        <label for="url">*URL:</label>
        <input type="text" id = "url" name = "url">
        <input type="submit">
    </form>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/footer.php'; ?>