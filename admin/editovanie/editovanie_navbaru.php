<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Navbar\Navbar;
$navbar = new Navbar();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    $navbar_vypis = $navbar->vypisJednehoZaznamu($_GET['id']);
}


?>

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
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/navbar.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/sidebar.php'; ?>


<div class = "vytvorenie_otazky_a_odpovede">
<form action="" method = "POST" class = "vytvorenie_otazky_a_odpovede_forma">

<label for="nazov">*Ikona:</label>
<input type="text" id="nazov" name="nazov" value="<?php echo $navbar_vypis['nazov']; ?>">


<label for="url">*URL:</label>
<input type="text" id="url" name="url" value="<?php echo $navbar_vypis['url']; ?>">


<input type="submit" value = "Potvrdiť úpravy">
</form>
</div>



<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/footer.php'; ?>