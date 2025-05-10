<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/Akordeon.php';
use akordeon\Akordeon;
$Akordeon = new Akordeon();
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try{
        $otazka = $_POST['otazka_v'];
        $odpoved = $_POST['odpoved_v'];
        if (empty($otazka) || empty($odpoved)) {
            die("Vyplňte polia označené hviezdičkou");
        } else {
            $Akordeon->vytvorenieRiadku($otazka, $odpoved);
        }

    } catch(Exception $e) {
        die("Nastala chyba: " . $e -> getMessage());
    }
}

?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/navbar.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/sidebar.php'; ?>

<div class = "vytvorenie_otazky_a_odpovede">
    <form action="" method = "POST" class = "vytvorenie_otazky_a_odpovede_forma">
        <label for="otazka_v">*Otázka:</label>
        <input type="text" id = "otazka_v" name = "otazka_v">
        <label for="odpoved_v">*Odpoveď:</label>
        <input type="text" id = "odpoved_v" name = "odpoved_v">
        <input type="submit">
    </form>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/footer.php'; ?>