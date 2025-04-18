<?php
include(dirname(__FILE__) . "/../classes/uzivatel.php");
include(dirname(__FILE__) . "/../classes/footer_linky.php");
use uzivatel\Uzivatel;
use footer\Footer;
$overenie_admina = new Uzivatel();
$overenie_admina->overenie_Admina();
$footer = new Footer();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    $footer_vypis = $footer->vypis_jedneho_Zaznamu($_GET['id']);
}


?>

<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>


<div class = "vytvorenie_otazky_a_odpovede">
<form action="" method = "POST" class = "vytvorenie_otazky_a_odpovede_forma">

<label for="ikona">*Ikona:</label>
<input type="text" id="ikona" name="ikona" value="<?php echo htmlspecialchars($footer_vypis['ikona']); ?>">

<label for="farba_bg">*Farba pozadia:</label>
<input type="color" id="farba_bg" name="farba_bg" value="<?php echo htmlspecialchars($footer_vypis['farba_bg']); ?>">
<label for="farba_ikony">*Farba ikony:</label>
<input type="color" id="farba_ikony" name="farba_ikony" value="<?php echo htmlspecialchars($footer_vypis['farba_ikony']); ?>">

<label for="url">*URL:</label>
<input type="text" id="url" name="url" value="<?php echo htmlspecialchars($footer_vypis['url']); ?>">


<input type="submit">
</form>
</div>

<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    try{
      
        $ikona = $_POST['ikona'];
        $farba_pozadia = $_POST['farba_bg'];
        $farba_ikony = $_POST['farba_ikony'];
        $url = $_POST['url'];

        if(empty($ikona) || empty($farba_pozadia) || empty($farba_ikony) || empty($url)){
    
            die("Vyplňte polia označené hviezdičkou");
    
        } else{

        $id = $_GET['id'];
        $footer->editaciaRiadku($id,$ikona, $farba_pozadia,  $farba_ikony,  $url);
        }

    }catch(Exception $e){

         die("Nastala chyba: " . $e -> getMessage());
        }
}

?>


<?php include "parts/footer.php"; ?>