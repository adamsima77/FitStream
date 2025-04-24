<?php include "parts/header.php";?>
<?php include "parts/navbar.php"; ?>
<?php require 'parts/sidebar.php';?>
<?php include_once "classes/produkt.php"; ?>
<?php use produkt\Produkt?>
<?php $vypis = new Produkt();

$vypis_podkategorie = $vypis->vypisPodKategorieOblecenie();
?>
<?php

$filter = [];
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $filter = $vypis->filtrovanie($_GET['id']);
} else {
    $filter = $vypis_vyziva = $vypis->vypisOblecenie();
}
?>
<div class = "zaobalenie_oblecenie">
    <div class = "zao_2_oblecenie">
        <h1 class = "vyziva_oblecenie">Oblečenie</h1>
    <div class = "z_oblecenie">
        <p class = "p_oblecenie">Pánske športové oblečenie nesmie chýbať v šatníku žiadneho aktívneho muža, ktorý sa venuje silovému tréningu, behu, cyklistike, futbalu, hokeju alebo iným aktivitám na rekreačnej či profesionálnej úrovni. Dôležitosť pánskeho športového oblečenia na fitness by sme nemali podceňovať. 
        Správne zvolený materiál a strih pomôže cítiť sa pri cvičení dobre, čo ešte viac podporí výkony.  </p>
    </div>

<div class = "filtre_oblecenie">

<?php foreach($vypis_podkategorie as $podkategoria):?>
    <?php $id_pod =  $podkategoria['idkategorie'];?>
    <a href = "?id=<?php echo $id_pod;?>" style = "background-color: <?php echo $b = (isset($_GET['id']) && $_GET['id'] == $id_pod) ? "#2F3C7E;" : 
    "#2f52ff";?>"><?php echo $podkategoria['nazov_kategorie'];?></a>
<?php endforeach;?>

<?php if (isset($_GET['id'])):?>
    <a href = "http://localhost/FitStream/oblecenie.php" style = "background-color: red; margin-left:auto;">Odstrániť vybratý filter</a>
<?php endif;?>
</div>

<?php include_once "parts/box_oblecenie.php"?>

<?php include "parts/footer.php";?>