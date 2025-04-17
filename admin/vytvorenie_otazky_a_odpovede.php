<?php
include(dirname(__FILE__) . "/../classes/uzivatel.php");
include(dirname(__FILE__) . "/../classes/akordeon_class.php");
use uzivatel\Uzivatel;
use akordeon\Akordeon;
$overenie_admina = new Uzivatel();
$overenie_admina->overenie_Admina();

$Akordeon = new Akordeon();

?>

<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>


<div class = "vytvorenie_otazky_a_odpovede">
<form action="" method = "POST" class = "vytvorenie_otazky_a_odpovede_forma">

<label for="otazka_v">*Otázka:</label>
<input type="text" id = "otazka_v" name = "otazka_v">

<label for="odpoved_v">*Odpoveď:</label>
<input type="text" id = "odpoved_v" name = "odpoved_v">


<input type="submit">
</form>
</div>

<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    try{
      
        $otazka = $_POST['otazka_v'];
        $odpoved = $_POST['odpoved_v'];
        

        if(empty($otazka) || empty($odpoved)){
    
            die("Vyplňte polia označené hviezdičkou");
    
        } else{

        $Akordeon->vytvorenieRiadku($otazka, $odpoved);
        }

    }catch(Exception $e){

         die("Nastala chyba: " . $e -> getMessage());
        }
}

?>


<?php include "parts/footer.php"; ?>