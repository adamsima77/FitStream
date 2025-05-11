<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/Slideshow.php';
use slideshow\Slideshow;
$slideshow = new Slideshow();
?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try{
        $img = $slideshow->spracovanieFotky();
        $preklik = $_POST['Preklik'];
        if (empty($img) || empty($preklik)) {
            die("Vyplňte polia označené hviezdičkou");
        } else {
            $slideshow->vytvorenieZaznamu($img, $preklik);
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
    <form action="" method = "POST" class = "vytvorenie_otazky_a_odpovede_forma" enctype="multipart/form-data">
        <label for="img">*Fotka:</label>
        <input type="file" id = "img" name = "img">
        <label for="Preklik">*Preklik fotky:</label>
        <input type="text" id = "Preklik" name = "Preklik">
        <input type="submit" name = "submit" id = "submit">
    </form>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/footer.php'; ?>