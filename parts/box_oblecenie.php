<?php include_once "classes/produkt.php"; ?>
<?php use produkt\Produkt?>

<?php
$vypis = new Produkt();
$vypis_oblecenie = $vypis->vypisOblecenie();
?>

<div class="vyziva_skupina_oblecenie" id="vyziva_skupina_oblecenie">
  <?php foreach($vypis_oblecenie as $a): ?>
    <div class="box_vyziva_oblecenie">
      <div class="obrazok_vyziva_oblecenie">
        <a href = "produkt.php?id=<?php echo htmlspecialchars($a['idprodukty'])?>"><img src="<?php echo htmlspecialchars($a['img_hlavna']); ?>" alt="<?php  $b = (!($a['img_alt'] == null)) ? htmlspecialchars($a['img_alt']) : ""; echo $b;?>"></a>
      </div>
      <div class="nadpis_vyziva_oblecenie">
      <a href = "produkt.php?id=<?php echo htmlspecialchars($a['idprodukty'])?>"><h2><?php echo htmlspecialchars($a['produkt_nazov']); ?></h2></a>
        <p><?php echo htmlspecialchars(substr($a['hlavny_popis'], 0, 175)); ?>...</p>
        <p class="cena_vyziva_oblecenie"><?php echo htmlspecialchars($a['cena']);?>€</p>
      </div>
    </div>
  <?php endforeach; ?>
</div>
  </div> </div>
