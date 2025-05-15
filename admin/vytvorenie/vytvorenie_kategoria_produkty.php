<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\KategoriaProdukty\KategoriaProdukty;
$kategoria = new KategoriaProdukty();
$vypis_kategorie = $kategoria->kategoriaProduktyVypis();
?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try{
        $nazov = $_POST['nazov_kategorie'];
        $nadkategoria = $_POST['nazov_nadkategorie'];
        if (empty($nazov) || empty($nadkategoria)) {
            die("Vyplňte polia označené hviezdičkou");
        } else {
            $kategoria->vytvorenieZaznamu($nazov,$nadkategoria);
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
        <label for="nazov_kategorie">*Názov:</label>
        <input type="text" id = "nazov_kategorie" name = "nazov_kategorie">

        <label for="nazov">*Nadkategória:</label>
        <select name="nazov_nadkategorie" id="nazov_nadkategorie">

          <?php foreach($vypis_kategorie as $kategoria):?>

                 <option value = "<?php echo $kategoria['idkategorie'];?>"><?php echo $kategoria['nazov_kategorie'];?></option>
            <?php endforeach;?>

        </select>
        <input type="submit" value = "Uverejniť">
    </form>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/footer.php'; ?>