<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\KategoriaBlog\KategoriaBlog;
$kategoriablog = new KategoriaBlog();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    $kategoria_vypis = $kategoriablog->vypisJednehoZaznamu($_GET['id']);
}



?>

<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    try{
      
        $nazov = $_POST['nazov_blog_k'];
      

        if(empty($nazov)){
    
            die("Vyplňte polia označené hviezdičkou");
    
        } else{

        $id = $_GET['id'];
        $kategoriablog->editaciaRiadku($id,$nazov);
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

<label for="nazov_blog_k">*Názov:</label>
<input type="text" id="nazov_blog_k" name="nazov_blog_k" value="<?php echo htmlspecialchars($kategoria_vypis['nazov_kategorie_blog']); ?>">

<input type="submit">
</form>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/footer.php'; ?>