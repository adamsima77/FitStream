<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Doprava\Doprava;

$doprava = new Doprava();
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try{
        $nazov = $_POST['typ_dopravy'];
       

        if (empty($nazov)) {
            die("Vyplňte polia označené hviezdičkou");
        } else {
            $doprava->vytvorenieZaznamu($nazov);
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
        <label for="typ_dopravy">*Názov:</label>
        <input type="text" id = "typ_dopravy" name = "typ_dopravy">
     
        <input type="submit">
    </form>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/footer.php'; ?>