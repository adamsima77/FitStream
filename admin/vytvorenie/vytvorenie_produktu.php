<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Produkt\Produkt;
$vypis_Produktov = new Produkt();
$vypis_kategorii = $vypis_Produktov->vypisKategorie();
$vypis_pod_kategorii = $vypis_Produktov->vypisPodKategorie();
?>
<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    try{

        $img = $vypis_Produktov->spracovanieFotky();
        $nazov = $_POST['nadpis_produktu'];
        $znacka = $_POST['znacka_produktu'];
        $popis_produktu = $_POST['popis_mce'];
        $klucovy_popis = $_POST['klucovy_popis'];
        $overenie = str_replace(",",".",trim($_POST['cena']));
        if (is_numeric($overenie)) {

            $cena = (float) $overenie;

        } else {

            die("Zle zadaný formát ceny");
        }

        if (is_numeric($_POST['pocet_kusov'])){
           if($_POST['pocet_kusov'] >= 0){
            $pocet_kusov = (int) $_POST['pocet_kusov'];
           }
        } else {

            die("Zadali ste zlý formát pri počte kusov !");
        }
        $pocet_kusov = $_POST['pocet_kusov'];
        $popis_img = $_POST['popis_foto'];
        $kategoria = $_POST['kategoria'] ?? null;
        $podkategorie = $_POST['podkategoria'] ?? null;

        $popis_img = (empty($_POST['popis_foto'])) ? " " : $_POST['popis_foto'];

        if(empty($nazov) ||empty($znacka) || empty($popis_produktu) || empty($klucovy_popis) || empty($cena)
        || empty($img) || $podkategorie === null || $kategoria === null){
    
            die("Vyplňte polia označené hviezdičkou");
    
        } else{

        $vypis_Produktov->vytvorenieProduktu($nazov, $znacka,  $popis_produktu,  $klucovy_popis,$cena, 
        $pocet_kusov, $img, $popis_img, $kategoria,  $podkategorie);
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
<input type="text" id = "nadpis_produktu" name = "nadpis_produktu">

<label for="znacka_produktu">*Značka:</label>
<input type="text" id = "znacka_produktu" name = "znacka_produktu">

<label for="foto">*Fotka:</label>
<input type="file" id = "foto" name = "foto">

<label for="popis_foto">Popis fotky:</label>
<input type="text" id = "popis_foto" name = "popis_foto">

<label for="popis_mce">*Popis produktu:</label>
<textarea name="popis_mce" id="popis_mce" class = "popis_mce"></textarea>

<label for="klucovy_popis">*Kľúčový popis:</label>
<textarea name="klucovy_popis" id="klucovy_popis"></textarea>


<label for="cena">*Cena:</label>
<input type="text" id = "cena" name = "cena">

<label for="pocet_kusov">*Počet kusov:</label>
<input type="number" id = "pocet_kusov" name = "pocet_kusov">

<label for="kategoria">*Vyberte do ktorej kategórie ma produkt patriť:</label>
  <select id="kategoria" name="kategoria">
       <option value="" disabled selected>Vyberte kategóriu:</option>
      <?php foreach($vypis_kategorii as $kategoria):?>
          <option value="<?php echo $kategoria['idkategorie'];?>"><?php echo $kategoria['nazov_kategorie'];?></option>
      <?php endforeach;?>
  </select>

  <select id="podkategoria" name="podkategoria">
       <option value="" disabled selected>Vyberte podkategóriu:</option>
      <?php foreach($vypis_pod_kategorii as $pod_kategoria):?>
          <option value="<?php echo $pod_kategoria['idkategorie'];?>"><?php echo $pod_kategoria['nazov_kategorie'];?></option>
      <?php endforeach;?>
  </select>
<input type="submit" name = "submit" value = "Uverejniť">
</form>
</div>




<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/footer.php'; ?>