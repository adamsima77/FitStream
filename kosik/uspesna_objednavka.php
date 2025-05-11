<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/uzivatel_session.php');?>
<?php use FitStream\Objednavky\Objednavky;?>


<?php $objednavky = new Objednavky();?>



<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/header.php'; ?>


<div class = "uspesna_objednavka">
<h1>Vaša objednávka bola úspešná.</h1>
<a href="<?php echo BASE_URL . "index.php";?>">Návrat na hlavnú stránku</a>
</div>