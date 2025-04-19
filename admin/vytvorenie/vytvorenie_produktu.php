<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/produkt.php';
use produkt\Produkt;
$vypis_Produktov = new Produkt();

?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/navbar.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/sidebar.php'; ?>


<div class = "vytvorenie_produktu">
<form action="" method = "POST" class = "vytvorenie_produktu_forma">

<label for="nadpis_produktu">*Názov:</label>
<input type="text" id = "nadpis_produktu" name = "nadpis_produktu">

<label for="znacka_produktu">*Značka:</label>
<input type="text" id = "znacka_produktu" name = "znacka_produktu">

<label for="foto">*Fotka:</label>
<input type="file" id = "foto" name = "foto">

<label for="popis_foto">Popis fotky:</label>
<input type="text" id = "popis_foto" name = "popis_foto">

<label for="popis_produktu">*Popis produktu:</label>
<textarea name="popis_produktu" id="popis_produktu"></textarea>

<label for="klucovy_popis">*Kľúčový popis:</label>
<textarea name="klucovy_popis" id="klucovy_popis"></textarea>


<label for="cena">*Cena:</label>
<input type="text" id = "cena" name = "cena">

<label for="pocet_kusov">*Počet kusov:</label>
<input type="number" id = "pocet_kusov" name = "pocet_kusov">

<label for="velkost">Veľkosť:</label>
<input type="text" id = "velkost" name = "velkost">


<label for="farba">Farba:</label>
<input type="text" name = "farba" id = "farba">


<input type="submit">
</form>
</div>

<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    try{
      
        $nazov = $_POST['nadpis_produktu'];
        $znacka = $_POST['znacka_produktu'];
        $popis_produktu = $_POST['popis_produktu'];
        $klucovy_popis = $_POST['klucovy_popis'];
        $cena = $_POST['cena'];
        $pocet_kusov = $_POST['pocet_kusov'];
        $velkost = $_POST['velkost'];
        $farba = $_POST['farba'];
        $img = $_POST['foto'];
        $popis_img = $_POST['popis_foto'];

        $velkost = (empty($_POST['velkost'])) ? " " : $_POST['velkost'];
        $farba = (empty($_POST['farba'])) ? " " : $_POST['farba'];
        $popis_img = (empty($_POST['popis_foto'])) ? " " : $_POST['popis_foto'];

        if(empty($nazov) ||empty($znacka) || empty($popis_produktu) || empty($klucovy_popis) || empty($cena)
        || empty($pocet_kusov) || empty($img)){
    
            die("Vyplňte polia označené hviezdičkou");
    
        } else{

        $vypis_Produktov->vytvorenieProduktu($nazov, $znacka,  $popis_produktu,  $klucovy_popis,$cena, 
        $pocet_kusov,  $velkost,  $farba, $img, $popis_img);
        }

    }catch(Exception $e){

         die("Nastala chyba: " . $e -> getMessage());
        }
}

?>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/footer.php'; ?>