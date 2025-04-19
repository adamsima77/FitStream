<?php include "parts/header.php";?>
<?php include "parts/navbar.php"; ?>
<?php require 'parts/sidebar.php';?>
<?php include_once "classes/produkt.php"; ?>
<?php use produkt\Produkt?>
<?php $vypis = new Produkt();?>

<div class = "zaobalenie_oblecenie">
    <div class = "zao_2_oblecenie">
        <h1 class = "vyziva_oblecenie">Oblečenie</h1>
    <div class = "z_oblecenie">
        <p class = "p_oblecenie">Pánske športové oblečenie nesmie chýbať v šatníku žiadneho aktívneho muža, ktorý sa venuje silovému tréningu, behu, cyklistike, futbalu, hokeju alebo iným aktivitám na rekreačnej či profesionálnej úrovni. Dôležitosť pánskeho športového oblečenia na fitness by sme nemali podceňovať. 
        Správne zvolený materiál a strih pomôže cítiť sa pri cvičení dobre, čo ešte viac podporí výkony.  </p>
    </div>

<div class = "filtre_oblecenie">

<a href = "">Najnovšie</a>
<a href = "">Najlacnejšie</a>
<a href = "">Najdrahšie</a>

</div>

<?php include_once "parts/box_oblecenie.php"?>

<?php include "parts/footer.php";?>