<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/akordeon_class.php';
use akordeon\Akordeon;
$Akordeon = new Akordeon();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    $akordeon_vypis = $Akordeon->vypis_jedneho_Zaznamu($_GET['id']);
}


?>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/navbar.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/sidebar.php'; ?>


<div class = "vytvorenie_otazky_a_odpovede">
<form action="" method = "POST" class = "vytvorenie_otazky_a_odpovede_forma">

<label for="otazka_v">*Otázka:</label>
<input type="text" id="otazka_v" name="otazka_v" value="<?php echo htmlspecialchars($akordeon_vypis['otazka']); ?>">

<label for="odpoved_v">*Odpoveď:</label>
<textarea name="odpoved_v" id="odpoved_v"><?php echo htmlspecialchars($akordeon_vypis['odpoved']); ?></textarea>




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

        $id = $_GET['id'];
        $Akordeon->editaciaRiadku($id,$otazka, $odpoved);
        }

    }catch(Exception $e){

         die("Nastala chyba: " . $e -> getMessage());
        }
}

?>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/admin/parts/footer.php'; ?>