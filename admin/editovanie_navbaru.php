<?php
include(dirname(__FILE__) . "/../classes/uzivatel.php");
include(dirname(__FILE__) . "/../classes/navbar_links.php");
use uzivatel\Uzivatel;
use navbar\Navbar;
$overenie_admina = new Uzivatel();
$overenie_admina->overenie_Admina();
$navbar = new Navbar();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    $navbar_vypis = $navbar->vypis_jedneho_Zaznamu($_GET['id']);
}


?>

<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>


<div class = "vytvorenie_otazky_a_odpovede">
<form action="" method = "POST" class = "vytvorenie_otazky_a_odpovede_forma">

<label for="nazov">*Ikona:</label>
<input type="text" id="nazov" name="nazov" value="<?php echo htmlspecialchars($navbar_vypis['nazov']); ?>">


<label for="url">*URL:</label>
<input type="text" id="url" name="url" value="<?php echo htmlspecialchars($navbar_vypis['url']); ?>">


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

        $id = $_GET['id'];
        $navbar->editaciaRiadku($id,$nazov, $url);
        }

    }catch(Exception $e){

         die("Nastala chyba: " . $e -> getMessage());
        }
}

?>


<?php include "parts/footer.php"; ?>