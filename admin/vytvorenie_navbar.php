<?php
include(dirname(__FILE__) . "/../classes/uzivatel.php");
include(dirname(__FILE__) . "/../classes/navbar_links.php");
use uzivatel\Uzivatel;
use navbar\Navbar;
$overenie_admina = new Uzivatel();
$overenie_admina->overenie_Admina();

$navbar = new Navbar();

?>

<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>


<div class = "vytvorenie_otazky_a_odpovede">
<form action="" method = "POST" class = "vytvorenie_otazky_a_odpovede_forma">

<label for="nazov">*Názov:</label>
<input type="text" id = "nazov" name = "nazov">

<label for="url">*URL:</label>
<input type="text" id = "url" name = "url">
<input type="submit">
</form>
</div>

<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    try{
      
        $nazov = $_POST['nazov'];
        $url = $_POST['url'];
     
        if(empty($nazov) || empty($url)){
    
            die("Vyplňte polia označené hviezdičkou");
    
        } else{

        $navbar->vytvorenie_Zaznamu($nazov, $url);
        }

    }catch(Exception $e){

         die("Nastala chyba: " . $e -> getMessage());
        }
}

?>


<?php include "parts/footer.php"; ?>