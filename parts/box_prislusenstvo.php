<?php include_once "classes/vypis_prislusenstvo.php"; ?>
<?php use vypis_prislusenstvo\vypis_prislusenstvo?>

<?php 
$vypis = new vypis_prislusenstvo();
$vypis_prislusenstvo = $vypis->vypis_prislusenstvo();
?>
<div class="vyziva_skupina_prislusenstvo" id="vyziva_skupina_prislusenstvo">
<?php foreach($vypis_prislusenstvo as $a): ?>
<div class="box_vyziva_prislusenstvo">
<div class="obrazok_vyziva_prislusenstvo">

<a href = "produkt.php?id=<?php echo $a['idprodukty']?>"><img src='<?php echo $a['img_url']; ?>' alt="<?php echo !empty($a['img_alt']) ? $a['img_alt'] : ''; ?>"></a>
</div>
<div class="nadpis_vyziva_prislusenstvo">

<a href = "produkt.php?id=<?php echo $a['idprodukty']?>"><h2><?php echo $a['nazov']; ?></h2></a>
<p><?php echo substr($a['popis'], 0, 175); ?>...</p>
<p class="cena_vyziva_prislusenstvo"><?php echo $a['cena']; ?>€</p>
</div>

</div>
<?php endforeach; ?>
</div></div></div>