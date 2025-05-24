<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Slideshow\Slideshow;
$slideshow = new Slideshow();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    $slideshow_vypis = $slideshow->vypisJednehoZaznamu($_GET['id']);
}


?>

<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    try{
       
        $img = $slideshow->spracovanieFotky();
        $preklik = $_POST['preklik'];
       
        $overenie_img = $slideshow->overenieFotoEdit($_GET['id']);
        if(empty($img) || $img == ''){
            if (!empty($overenie_img)){
                  
                   $img = $overenie_img['img_url'];
  
            } 
  
          }

          
        if(empty($preklik)){
    
            die("Vyplňte polia označené hviezdičkou");
    
        } else{

        $id = $_GET['id'];
        $slideshow->editaciaRiadku($id,$img, $preklik);
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
<form action="" method = "POST" class = "vytvorenie_otazky_a_odpovede_forma" enctype="multipart/form-data">

<label for="img">*Fotka:</label>
<input type="file" id="img" name="img">


<label for="preklik">*Preklik:</label>
<input type="text" id="preklik" name="preklik" value="<?php echo $slideshow_vypis['img_preklik']; ?>">


<input type="submit" name = "submit" value = "Potvrdiť úpravy">
</form>
</div>



<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/footer.php'; ?>