<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\KategoriaProdukty\KategoriaProdukty;
$kategoriaprodukty = new KategoriaProdukty();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    $kategoria_vypis = $kategoriaprodukty->vypisJednehoZaznamu($_GET['id']);
}



?>

<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    try{
      
        $nazov = $_POST['nazov_kategorie_pr'];
        $id_nadkategorie = $_POST['nadkategoria'];
      

        if(empty($nazov)){
    
            die("Vyplňte polia označené hviezdičkou");
    
        } else{

        $id = $_GET['id'];
        $kategoriaprodukty->editaciaRiadku($id,$nazov,$id_nadkategorie);
        }

    }catch(Exception $e){

         die("Nastala chyba: " . $e -> getMessage());
        }
}
?>
<?php $vypis_nadkategorie = $kategoriaprodukty->vypisNadKategorie($_GET['id']);?>
<?php $vypis_kategorii = $kategoriaprodukty->kategoriaProduktyVypis();?>

<?php  $id_nadkategorie = (is_string($vypis_nadkategorie)) ? $vypis_nadkategorie :$vypis_nadkategorie['idkategorie']?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/navbar.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/sidebar.php'; ?>


<div class = "vytvorenie_otazky_a_odpovede">
<form action="" method = "POST" class = "vytvorenie_otazky_a_odpovede_forma">

<label for="nazov_kategorie_pr">*Názov:</label>
<input type="text" id="nazov_kategorie_pr" name="nazov_kategorie_pr" value="<?php echo $kategoria_vypis['nazov_kategorie']; ?>">

<select name="nadkategoria" id="nadkategoria">

<?php if (is_array($vypis_nadkategorie)): ?>
    
  <option value="<?php echo $id_nadkategorie;?>" selected><?php echo $vypis_nadkategorie['nazov_kategorie'];?></option>
  <option value="<?php echo "-1";?>"><?php echo "Žiadna kategória";?></option>
<?php else: ?>
    <option value="-1" selected>Žiadna kategória</option>
<?php endif; ?>


  <?php foreach($vypis_kategorii as $kategoria):?>

     <?php if($kategoria['idkategorie'] != $id_nadkategorie):?>
      <option value="<?php echo $kategoria['idkategorie'];?>"><?php echo $kategoria['nazov_kategorie'];?></option>
      <?php endif;?>

  <?php endforeach;?>

</select>

<input type="submit" value = "Potvrdiť úpravy">
</form>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/footer.php'; ?>