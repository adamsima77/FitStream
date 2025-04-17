<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php require 'parts/sidebar.php'; ?>
<?php include_once "classes/produkt.php"; ?>
<body>
<?php 
    use produkt\Produkt;
    $p = new Produkt();

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $produkt = $p->produktDetail($_GET['id']);
    } else {
        die("Zlé ID.");
    }
    ?>
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
         <a href="" class = "produkt_do_kosika"><i class="fa fa-shopping-cart"></i> Do košíka</a>
         
</div>

</div>
   
<h2>Popis:</h2>
    <hr class = "produkt_hr">
    <p class="produkt_popis"><?php echo nl2br(htmlspecialchars($produkt['popis'])); ?></p>
    
  </div>
</div>

<?php include "parts/footer.php"; ?>