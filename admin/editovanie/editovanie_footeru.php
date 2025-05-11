<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Footer\Footer;
$footer = new Footer();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    $footer_vypis = $footer->vypisJednehoZaznamu($_GET['id']);
}



?>

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


<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/navbar.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/sidebar.php'; ?>


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

<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/footer.php'; ?>