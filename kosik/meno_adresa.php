<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/uzivatel_session.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/Objednavky.php');?>
<?php use objednavky\Objednavky?>


<?php $objednavky = new Objednavky();?>
<?php $objednavky->overeniePodstranokKosika();?>
<?php

$objednavky->spracovanieUdajov();
$doprava = $objednavky->vypisDoprava();
$platba = $objednavky->vypisPlatba();
?>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/navbar.php'; ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/sidebar.php');?>

<form action="" method = "POST" class = "osobne_udaje_kosik">

<h1>Osobné údaje:</h1>
<label for="email">*E-mail:</label>
<input type="email" name = "email" class = "email_kos">
<label for="meno">*Meno:</label>
<input type="text" name = "meno">
<label for="priezvisko">*Priezvisko:</label>
<input type="text" name = "priezvisko">
<label for="telefonne_cislo">*Telefónne číslo:</label>
<input type="text" name = "telefonne_cislo">

<h1>Adresa:</h1>
<label for="mesto">*Mesto:</label>
<input type="text" name = "mesto">
<label for="ulica">*Ulica:</label>
<input type="text" name = "ulica">
<label for="psc">*PSČ:</label>
<input type="text" name = "psc">

<h1>Typ platby a doprava:</h1>
<label for="platba">*Typ platby:</label>
<select name="platba" id="platba">

<?php foreach($platba as $polozka):?>

<option value = "<?php echo $polozka['idplatba'];?>"><?php echo $polozka['nazov'];?></option>
<?php endforeach;?>
</select>
<label for="doprava">*Typ dopravy:</label>
<select name="doprava" id="doprava">

<?php foreach($doprava as $polozka):?>

<option value = "<?php echo $polozka['iddoprava'];?>"><?php echo $polozka['nazov'];?></option>
<?php endforeach;?>
</select>
<input type="submit" value = "Potvrdiť osobné údaje">
</form>








<?php include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/footer.php'; ?>