<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/uzivatel_session.php');?>
<?php include_once "classes/produkt.php"; ?>
<?php include_once "classes/Objednavky.php"; ?>
<?php use produkt\Produkt;
      use objednavky\Objednavky;?>
<?php

$objednavky = new Objednavky();

?>

<?php 
    
    $p = new Produkt();

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $produkt = $p->produktDetail($_GET['id']);
    } else {
        die("Zlé ID.");
    }
    ?>


<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){


    try{
      
        $pocet_kusov = $_POST['pocet_produktov'];
        $_POST['idpr'] = $_GET['id'];
        $id = $_POST['idpr'];

        if(empty($pocet_kusov)){
    
            die("Vyplňte polia označené hviezdičkou");
    
        } else{

          $objednavky->pridanieDoKosika($id,$pocet_kusov);

              
        }

    }catch(Exception $e){

         die("Nastala chyba: " . $e -> getMessage());
        }
}

?>



<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php require 'parts/sidebar.php'; ?>

<body>

   

<div class="produkt_zaobalenie">
  <div class="produkt_z">
  
<div class = "produkt_nazov_cena_popis">
    <img src="<?php echo htmlspecialchars($produkt['img_hlavna']); ?>" 
         class="produkt_img" 
         alt="<?php echo htmlspecialchars($produkt['img_alt']); ?>">
        <div class = "produkt_col">
       
         <h1 class="produkt_nazov"><?php echo htmlspecialchars($produkt['nazov']); ?></h1>
         <p class = "hlavny_popis"><?php echo $produkt['hlavny_popis'];?></p>
         <p class="produkt_cena"><?php echo htmlspecialchars($produkt['cena']); ?> €</p>
    <form action="" method="POST">
      <input type = "number" id = "pocet_produktov" name = "pocet_produktov" value = "1">
      <input type="submit" class="produkt_do_kosika" value="Do košíka">
    </form> 
         
</div>

</div>
   
<h2>Popis:</h2>
    <hr class = "produkt_hr">
    <p class="produkt_popis"><?php echo (htmlspecialchars($produkt['popis'])); ?></p>
    
  </div>
</div>

<?php include "parts/footer.php"; ?>