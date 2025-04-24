<?php include "parts/header.php";?>
<?php include "parts/navbar.php"; ?>
<?php require 'parts/sidebar.php';?>
<?php include_once "classes/produkt.php"; ?>
<?php use produkt\Produkt?>

<?php $vypis = new Produkt();
$vypis_podkategoria = $vypis->vypisPodKategoriePrislusenstvo();
?>

<?php
$filter = [];
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $filter = $vypis->filtrovanie($_GET['id']);
} else {
    $filter = $vypis_vyziva = $vypis->vypisPrislusentvo();
}
?>

<div class = "zaobalenie_prislusenstvo">
<div class = "zao_2_prislusenstvo">
<h1 class = "vyziva_prislusenstvo">Športové príslušenstvo</h1>
<div class = "z_prislusentsvo">
<p class = "p_vyziva_prislusenstvo">Táto časť nášho obchodu so 
    športovými potrebami ponúka širokú škálu vysokokvalitného a funkčného príslušenstva pre
     športovcov všetkých úrovní. Nájdete tu širokú ponuku športových tašiek, obuvi, ochranných pomôcok, 
     tréningových doplnkov a 
    mnoho ďalšieho, čo vám pomôže dosiahnuť vaše športové ciele a zlepšiť zážitok z tréningu a športu.  </p>
</div>


<div class = "filtre_prislusenstvo">

<?php foreach($vypis_podkategoria as $podkategoria):?>
    <?php $id_pod =  $podkategoria['idkategorie'];?>
    <a href = "?id=<?php echo $id_pod;?>"><?php echo $podkategoria['nazov_kategorie'];?></a>
<?php endforeach;?>
<?php if (isset($_GET['id'])):?>
    <a href = "http://localhost/FitStream/prislusenstvo.php" style = "background-color: red; margin-left:auto;">Odstrániť vybratý filter</a>
<?php endif;?>
</div>

<?php include_once "parts/box_prislusenstvo.php";?>

<?php include "parts/footer.php";?>