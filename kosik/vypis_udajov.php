<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/uzivatel_session.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/Objednavky.php');?>
<?php use objednavky\Objednavky?>


<?php $objednavky = new Objednavky();?>

<?php 

$platba = $objednavky->getPlatba($_SESSION['kosik_platba']);
$doprava = $objednavky->getDoprava($_SESSION['kosik_doprava']);

?>

<?php 
$objednavky->ukladanieDoDatabazy($_SESSION['kosik_email'], $_SESSION['kosik_meno'],
 $_SESSION['kosik_priezvisko'], $_SESSION['kosik_telefonne_cislo'], 
 $_SESSION['kosik_mesto'], $_SESSION['kosik_ulica'], 
$_SESSION['kosik_psc'], $_SESSION['kosik_platba'], $_SESSION['kosik_doprava'],$_SESSION['user_id']);
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/navbar.php'; ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/sidebar.php');?>


<div class = "vypis_udajov">

<h1>Sumarizácia údajov</h1>
<h2>Osobné údaje:</h2>
<p>E-mail: <?php echo $_SESSION['kosik_email'];?></p>
<p>Meno: <?php echo $_SESSION['kosik_meno'];?></p>
<p>Priezvisko: <?php echo $_SESSION['kosik_priezvisko'];?></p>
<p>Telefónne číslo: <?php echo $_SESSION['kosik_telefonne_cislo'];?></p>
<h2>Adresa:</h2>
<p>Mesto: <?php echo $_SESSION['kosik_mesto'];?></p>
<p>Ulica: <?php echo $_SESSION['kosik_ulica'];?></p>
<p>E-mail: <?php echo $_SESSION['kosik_psc'];?></p>
<h2>Platba a doprava:</h2>
<p>Typ platby: <?php echo $platba['nazov'] ;?></p>
<p>Doprava: <?php echo $doprava['nazov'];?></p>

<form action="" method = "POST" class = "vypis_forma">

<input type="submit" class = "vypis_submit" value = "Dokončiť objednávku">

</form>
</div>





<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/footer.php'; ?>