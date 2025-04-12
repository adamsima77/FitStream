<?php include_once "classes/vypis_oblecenie.php"; ?>
<?php use vypis_oblecenie\vypis_oblecenie?>

<?php
$vypis = new vypis_oblecenie();
$vypis_oblecenie = $vypis->vypis_oblecenie();
?>

<div class="vyziva_skupina_oblecenie" id="vyziva_skupina_oblecenie">
  <?php foreach($vypis_oblecenie as $a): ?>
    <div class="box_vyziva_oblecenie">
      <div class="obrazok_vyziva_oblecenie">
        <a href=""><img src="<?php echo $a['img_url']; ?>" alt="<?php  $b = (!($a['img_alt'] == null)) ? $a['img_alt'] : ""; echo $b;?>"></a>
      </div>
      <div class="nadpis_vyziva_oblecenie">
        <a href=""><h2><?php echo $a['nazov']; ?></h2></a>
        <p><?php echo substr($a['popis'], 0, 175); ?></p>
        <p class="cena_vyziva_oblecenie"><?php echo $a['cena'];?>€</p>
      </div>
    </div>
  <?php endforeach; ?>
</div>
  </div> </div>
