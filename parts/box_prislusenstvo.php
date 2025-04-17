<?php include_once "classes/produkt.php"; ?>
<?php use produkt\Produkt?>

<?php 
$vypis = new Produkt();
$vypis_prislusenstvo = $vypis->vypisPrislusentvo();
?>
<div class="vyziva_skupina_prislusenstvo" id="vyziva_skupina_prislusenstvo">
<?php foreach($vypis_prislusenstvo as $a): ?>
<div class="box_vyziva_prislusenstvo">
<div class="obrazok_vyziva_prislusenstvo">

<a href = "produkt.php?id=<?php echo htmlspecialchars($a['idprodukty'])?>"><img src='<?php echo htmlspecialchars($a['img_hlavna']); ?>' alt="<?php echo !empty($a['img_alt']) ? htmlspecialchars($a['img_alt']) : ''; ?>"></a>
</div>
<div class="nadpis_vyziva_prislusenstvo">

<a href = "produkt.php?id=<?php echo $a['idprodukty']?>"><h2><?php echo $a['produkt_nazov']; ?></h2></a>
<p><?php echo htmlspecialchars(substr($a['hlavny_popis'], 0, 175)); ?>...</p>
<p class="cena_vyziva_prislusenstvo"><?php echo htmlspecialchars($a['cena']); ?>€</p>
</div>

</div>
<?php endforeach; ?>
</div></div></div>