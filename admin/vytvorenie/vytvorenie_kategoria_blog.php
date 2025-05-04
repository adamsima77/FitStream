<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/KategoriaBlog.php';
use kategoriablog\KategoriaBlog;
$kategoriablog = new KategoriaBlog();
?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try{
        $nazov = $_POST['nazov_blogu'];
        if (empty($nazov)) {
            die("Vyplňte polia označené hviezdičkou");
        } else {
            $kategoriablog->vytvorenieZaznamu($nazov);
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
        <input type="text" id = "nazov_blogu" name = "nazov_blogu">
        <input type="submit">
    </form>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/footer.php'; ?>