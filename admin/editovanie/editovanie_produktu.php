<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/Produkt.php';
use produkt\Produkt;
$produkt = new Produkt();
$vypis_pod_kategorii = $produkt->vypisPodKategorie();


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    $produkt_vypis = $produkt->vypisJednehoZaznamu($_GET['id']);
}

 $overenie_kategorie = $produkt->vypisKategorieHasProdukty($_GET['id']);
 $vypis_kategorii = $produkt->vypisKategorie();
 $kategoria_select = $produkt->getCategoryEdit($_GET['id']);
 $podkategoria_select = $produkt->getPodCategoryEdit($_GET['id']);
?>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){


    try{
      
        $img = $produkt->spracovanieFotky();
        $nazov = $_POST['nadpis_produktu'];
        $znacka = $_POST['znacka_produktu'];
        $popis_produktu = $_POST['popis_produktu'];
        $klucovy_popis = $_POST['klucovy_popis'];
        $cena =  $_POST['cena'];
        $pocet_kusov = $_POST['pocet_kusov'];
        $velkost = $_POST['velkost'];
        $farba = $_POST['farba'];
        $img_popis = $_POST['popis_foto'];
        $kategoria = $_POST['kategoria'];
        $podkategoria = $_POST['podkategoria'];
        $overenie_img = $produkt->overenieFotoEdit($_GET['id']);
        
        if (empty($nazov) || empty($znacka) || empty($popis_produktu) || empty($klucovy_popis) || empty($cena) || empty($pocet_kusov) ||
            empty($velkost) || empty($farba) || empty($img_popis) || empty($kategoria)) {
            
            die("Vyplňte všetky polia označené hviezdičkou.");
        } else {
        
        if(empty($img) || $img == ''){
          if (!empty($overenie_img)){
                
                 $img = $overenie_img['img_hlavna'];

          } 

        }
        $id = $_GET['id'];
        $produkt->editaciaRiadku(
        $id, 
        $nazov,
        $znacka,
        $popis_produktu,
        $klucovy_popis,
        $cena,
        $pocet_kusov,
        $velkost,
        $farba,
        $img,
        $img_popis,
        $kategoria,
        $podkategoria);
        }

    }catch(Exception $e){

         die("Nastala chyba: " . $e -> getMessage());
        }
}

?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/navbar.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/sidebar.php'; ?>


<div class = "vytvorenie_produktu">
<form action="" method = "POST" class = "vytvorenie_produktu_forma" enctype="multipart/form-data">

<label for="nadpis_produktu">*Názov:</label>
<input type="text" id = "nadpis_produktu" name = "nadpis_produktu" value = "<?php echo $produkt_vypis['nazov'];?>">

<label for="znacka_produktu">*Značka:</label>
<input type="text" id = "znacka_produktu" name = "znacka_produktu" value = "<?php echo $produkt_vypis['znacka'];?>" >

<label for="foto">*Fotka:</label>
<input type="file" id = "foto" name = "foto">

<label for="popis_foto">Popis fotky:</label>
<input type="text" id = "popis_foto" name = "popis_foto" value = "<?php echo $produkt_vypis['img_alt'];?>">

<label for="popis_produktu">*Popis produktu:</label>
<textarea name="popis_produktu" id="popis_produktu"><?php echo $produkt_vypis['popis'];?></textarea>

<label for="klucovy_popis">*Kľúčový popis:</label>
<textarea name="klucovy_popis" id="klucovy_popis"><?php echo $produkt_vypis['hlavny_popis'];?></textarea>


<label for="cena">*Cena:</label>
<input type="text" id = "cena" name = "cena" value = "<?php echo $produkt_vypis['cena'];?>">

<label for="pocet_kusov">*Počet kusov:</label>
<input type="number" id = "pocet_kusov" name = "pocet_kusov" value = "<?php echo $produkt_vypis['pocet_kusov'];?>">

<label for="velkost">Veľkosť:</label>
<input type="text" id = "velkost" name = "velkost" value = "<?php echo $produkt_vypis['velkost'];?>">


<label for="farba">Farba:</label>
<input type="text" name = "farba" id = "farba" value = "<?php echo $produkt_vypis['farba'];?>">

<label for="kategoria">*Vyberte do ktorej kategórie ma produkt patriť:</label>
  <select id="kategoria" name="kategoria">
       <option value="" disabled selected>Vyberte kategóriu:</option>
       <option value="<?php echo $kategoria_select['idkategorie'];?>" selected><?php echo $kategoria_select['nazov_kategorie'];?></option>
      <?php foreach($vypis_kategorii as $kategoria):?>
           
          <?php if ($kategoria_select['idkategorie'] == $kategoria['idkategorie']):?>
            <?php continue;?>
             <?php endif;?>               
          <option value="<?php echo $kategoria['idkategorie'];?>"><?php echo $kategoria['nazov_kategorie'];?></option>
      <?php endforeach;?>
  </select>


  <select id="podkategoria" name="podkategoria">
      <option value="" disabled selected>Vyberte podkategóriu:</option>
      <option value="<?php echo $podkategoria_select['idkategorie'];?>" selected><?php echo $podkategoria_select['nazov_kategorie'];?></option>
      <?php foreach($vypis_pod_kategorii as $pod_kategoria):?>
        <?php if ($podkategoria_select['idkategorie'] == $pod_kategoria['idkategorie']):?>
            <?php continue;?>
             <?php endif;?>    
          <option value="<?php echo $pod_kategoria['idkategorie'];?>"><?php echo $pod_kategoria['nazov_kategorie'];?></option>
      <?php endforeach;?>
  </select>
<input type="submit" name = "submit">
</form>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/footer.php'; ?>