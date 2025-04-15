<?php include_once "classes/vypis_produktov_na_hlavnej.php"; ?>
<?php use vypis_hlavna\vypis_hlavna?>
<?php 
$vypis_na_hlavnej = new vypis_hlavna();
$vypis = $vypis_na_hlavnej->vypis_na_hlavnej();

?>
<div class = "za_1">         
<h1> <a href =  "vyziva.php" class = "produkty">Produkty</a></h1>

<div class = "skup" id = "skupi">

<?php foreach($vypis as $a):?>
<div class = "box">
<div class = "obrazok">

<a href = "produkt.php?id=<?php echo htmlspecialchars($a['idprodukty'])?>"><img src="<?php echo htmlspecialchars($a['img_hlavna']); ?>" alt="<?php echo htmlspecialchars($a['img_alt'] ?? ''); ?>"></a>
</div>
<div class = "nadpis">
     
<a href = "produkt.php?id=<?php echo htmlspecialchars($a['idprodukty'])?>"><h2><?php echo htmlspecialchars($a['nazov']);?></h2></a>
<p class = "box_popis"><?php echo htmlspecialchars(substr($a['hlavny_popis'],0,175))?>...</p>

<p class = "cena"><?php echo htmlspecialchars($a['cena']);?>€</p>
</div>

</div>
<?php endforeach?>
</div>