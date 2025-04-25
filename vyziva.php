<?php include "parts/header.php";?>
<?php include "parts/navbar.php"; ?>
<?php require 'parts/sidebar.php';?>
<?php include_once "classes/produkt.php"; ?>
<?php use produkt\Produkt?>
<?php $vypis = new Produkt();
$vypis_podkategorii = $vypis->vypisPodKategorieVyziva();


$filter = [];
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $filter = $vypis->filtrovanie($_GET['id']);
} else {
    $filter = $vypis->vypis_vyziva();
}
?>



<div class = "zaobalenie">
<div class = "zao_2">
<h1 class = "vyziva">Doplnky výživy</h1>
<div class = "z">
<p class = "p_vyziva">Proteíny na predaj sú doplnky výživy, ktoré dodávajú základný zdroj 
    bielkovín pre všetkých športovcov a kulturistov, ktorých cieľom je rast svalov. 
    Tieto prípravky umožňujú efektívny nárast svalovej hmoty (zvýšiť objem svalov), podporujú zvýšenie výkonu a zrýchľujú regeneráciu svalových vlákien. Ak chcete budovať čistú svalovú hmotu alebo vyrysovať 
    svaly, proteín ako výživový doplnok dodá vášmu telu bielkoviny v potrebnom množstve. </p>
</div>



<div class = "filtre">

<?php foreach($vypis_podkategorii as $podkategoria):?>
    <?php $id_pod =  $podkategoria['idkategorie'];?>
    <a href = "?id=<?php echo $id_pod;?>" style = "background-color: <?php echo $b = (isset($_GET['id']) && $_GET['id'] == $id_pod) ? "#2F3C7E;" : 
    "#2f52ff"; ?>;"><?php echo $podkategoria['nazov_kategorie'];?></a>
<?php endforeach;?>

<?php if (isset($_GET['id'])):?>
    <a href = "http://localhost/FitStream/vyziva.php" style = "background-color: red; margin-left:auto;">Odstrániť vybratý filter</a>
<?php endif;?>

</div>


<?php include_once "parts/box_vyziva.php"?>

<?php include "parts/footer.php";?>