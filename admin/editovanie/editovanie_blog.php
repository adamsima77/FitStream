<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Blog\Blog;
$blog = new Blog();

$vypis_kategorii = $blog->vypisKategorii();

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    $blog_vypis = $blog->vypisJednehoZaznamu($_GET['id']);
}

$kategoria_select = $blog->getCategoryEdit($_GET['id']);

?>

<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    try{
      
        $fotka = $blog->spracovanieFotky();
        $nazov = $_POST['nazov'];
        $popis = $_POST['popis_mce'];
        $popis_fotky = $_POST['popis_fotky'];
        $_POST['id_uzivatela'] = $_SESSION['user_id'];
        $uzivatel = $_POST['id_uzivatela'];
        $kategoria = $_POST['kategoria'];
        $overenie_img = $blog->overenieFotoEdit($_GET['id']);
        if(empty($fotka) || $fotka == ''){
            if (!empty($overenie_img)){
                  
                   $fotka = $overenie_img['img_blog'];
  
            } }

        if (empty($nazov) || empty($popis) || empty($kategoria)){
    
            die("Vyplňte polia označené hviezdičkou");
    
        } else{

        $id = $_GET['id'];
        $blog->editaciaRiadku($nazov, $popis, $fotka, $popis_fotky, $uzivatel, $kategoria, $id);
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
        <input type="text" id = "nazov" name = "nazov" value = "<?php echo $blog_vypis['nazov']?>">
        <label for="popis_mce">*Popis:</label>
        <textarea name="popis_mce" id="popis_mce" class = "popis_mce"><?php echo $blog_vypis['popis']?></textarea>
        <label for="fotka">*Fotka:</label>
        <input type="file" id = "fotka" name = "fotka">
        <label for="popis_fotky">Popis fotky:</label>
        <input type="text" id = "popis_fotky" name = "popis_fotky" value = "<?php echo $blog_vypis['img_alt']?>">
        <select id="kategoria" name="kategoria">
        <option value="" disabled selected>Vyberte kategóriu:</option>
       <option value="<?php echo $kategoria_select['id_kategorie'];?>" selected><?php echo $kategoria_select['nazov_kategorie_blog'];?></option>
      <?php foreach($vypis_kategorii as $kategoria):?>
           
          <?php if ($kategoria_select['id_kategorie'] == $kategoria['id_kategorie']):?>
            <?php continue;?>
             <?php endif;?>               
          <option value="<?php echo $kategoria['id_kategorie'];?>"><?php echo $kategoria['nazov_kategorie_blog'];?></option>
      <?php endforeach;?>
  </select>
        <input type="submit" name = "submit" value = "Potvrdiť úpravy">
    </form>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/footer.php'; ?>