<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/uzivatel_session.php');?>
<?php use FitStream\Objednavky\Objednavky;?>


<?php $objednavky = new Objednavky();
      $vypis_poloziek = $objednavky->vypisPoloziek();
      ?>



<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/header.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/navbar.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/sidebar.php');?>


<?php if(empty($_COOKIE['kosik']) || $_COOKIE['kosik'] == '[]'):?>

    <?php echo "<h1 class = 'prazdny_kosik'>V košíku nie sú žiadne produkty.</h1>"?>

    <?php else:?>
<div class = "kosik_zaobalenie">
<div class = "kosik_zao">
<div class = "vypis_kosik">

<h1>Produkty v košíku:</h1>

<?php $suma = 0;?>
<?php foreach($vypis_poloziek as $produkt):?>

<?php $suma += $produkt['cena_produktu']?>

<div class="kosik_polozka">
<a href="kosik/vymazanie_kosik.php?id=<?php echo $produkt['idprodukty'];?>"><i class="fa fa-close"></i></a>
<img src = "<?php echo BASE_URL .  $produkt['img_hlavna'];?>">

<div class="polozka_info">
<a href = "produkt.php?id=<?php echo $produkt['idprodukty'];?>" class = "kosik_preklik"><h1><?php echo $produkt['nazov'];?></h1></a>
<p>Počet kusov: <?php echo $produkt['pocet_kusov'];?></p>

<p>Celková cena produktu: <?php echo $produkt['cena_produktu'];?>€</p>
</div>
</div>
<?php endforeach;?>
<div class = "vysledna_cena">
    <div class = "vysledna_cena_1">


<p>Cena bez DPH:</p>
<p><?php echo round($suma/1.23,2) ;?> €</p>


<p>Výsledná cena:</p>
<p><?php echo $suma;?> €</p>


</div>
</div>
</div>

<div class = "presun">
   

  

        <a href="kosik/meno_adresa.php" class = "presun_kosik">Pokračovať v objednávke</a>

  
</div>


</div>




</div>

</div>

<?php endif;?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/footer.php');?>