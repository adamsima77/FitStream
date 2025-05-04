<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/uzivatel_session.php');?>

<?php $uzivatel->overenieNastavenia($_SESSION['user_id'],$_GET['id']);?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/Objednavky.php');?>
<?php use objednavky\Objednavky?>


<?php $objednavky = new Objednavky();?>
<?php $nakupy = $objednavky->historiaNakupov($_SESSION['user_id']);?>



<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/header.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/navbar.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/sidebar.php');?>


<div class="nastavenia_zarovnanie">
    <div class="nastavenia_z">
        <h1>História nákupov:</h1>
        <?php foreach($nakupy as $produkt): ?>
            <div class="nastavenia_polozka">
                <div class="nastavenia_info">
                  <p>Id objednávky: <?php echo $produkt['idobjednavky']; ?></p>
                        <p>Cena objednávky: <?php echo $produkt['cena']; ?></p>
                   
                        <p>Stav objednávky: <?php echo $produkt['status']; ?></p>
                        <p>Dátum a čas objednávky: <?php echo $produkt['datum_objednavky']; ?></p>
                   
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>



<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/footer.php');?>