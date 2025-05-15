<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Blog\Blog;

$blog = new Blog();
$vypis_kategorii = $blog->vypisKategorii();
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try{

        $fotka = $blog->spracovanieFotky();
        $nazov = $_POST['nazov'];
        $popis = $_POST['popis'];
        $popis_fotky = $_POST['popis_fotky'];
        $_POST['id_uzivatela'] = $_SESSION['user_id'];
        $uzivatel = $_POST['id_uzivatela'];
        $kategoria = $_POST['kategoria'];

        if (empty($nazov) || empty($popis) || empty($fotka) || empty($kategoria)) {
            die("Vyplňte polia označené hviezdičkou");
        } else {
            $blog->vytvorenieZaznamu($nazov, $popis, $fotka, $popis_fotky, $uzivatel, $kategoria );
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
        <label for="nazov">*Názov:</label>
        <input type="text" id = "nazov" name = "nazov">
        <label for="popis">*Popis:</label>
        <textarea name="popis" id="popis"></textarea>
        <label for="fotka">*Fotka:</label>
        <input type="file" id = "fotka" name = "fotka">
        <label for="popis_fotky">Popis fotky:</label>
        <input type="text" id = "popis_fotky" name = "popis_fotky">
        <label for="kategoria">*Kategória:</label>
        <select id="kategoria" name="kategoria">
         <option value="" disabled selected>Vyberte podkategóriu:</option>
         <?php foreach($vypis_kategorii as $kategoria):?>
          <option value="<?php echo $kategoria['id_kategorie'];?>"><?php echo $kategoria['nazov_kategorie_blog'];?></option>
      <?php endforeach;?>
  </select>
        <input type="submit" name = "submit" value = "Uverejniť">
    </form>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/footer.php'; ?>