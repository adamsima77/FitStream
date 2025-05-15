<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/uzivatel_session.php');?>
<?php use FitStream\Objednavky\Objednavky;?>


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
<?php $objednavky->zobrazenieStavu();?>
<h1>Osobné údaje</h1>
<label for="email">*E-mail:</label>
<input type="email" name="email" class="email_kos" id="email" 
       value="<?php echo isset($_SESSION['kosik_email']) ? $_SESSION['kosik_email'] : ''; ?>">

<label for="meno">*Meno:</label>
<input type="text" name="meno" id="meno" 
       value="<?php echo isset($_SESSION['kosik_meno']) ? $_SESSION['kosik_meno'] : ''; ?>">

<label for="priezvisko">*Priezvisko:</label>
<input type="text" name="priezvisko" id="priezvisko" 
       value="<?php echo isset($_SESSION['kosik_priezvisko']) ? $_SESSION['kosik_priezvisko'] : ''; ?>">

<label for="telefonne_cislo">*Telefónne číslo:</label>
<input type="text" name="telefonne_cislo" id="telefonne_cislo" 
       value="<?php echo isset($_SESSION['kosik_telefonne_cislo']) ? $_SESSION['kosik_telefonne_cislo'] : ''; ?>">

<label for="check"  class="checkbox">
<input type="checkbox" id = "check" name = "check">
<span class="text">Nakupujete na firmu?</span>
</label>
<div id="firemne_udaje" style="display:none; margin-top: 10px;">
  <h1>Firemné údaje</h1>
  <label for="firma">Firma:</label>
  <input type="text" name="firma" id="firma" value = "<?php echo isset($_SESSION['kosik_firma']) ? $_SESSION['kosik_firma'] : '' ?>">

  <label for="ico">IČO:</label>
  <input type="text" name="ico" id="ico" value = "<?php echo isset($_SESSION['kosik_ico']) ? $_SESSION['kosik_ico'] : '' ?>">

  <label for="dic">DIČ:</label>
  <input type="text" name="dic" id="dic"  value = "<?php echo isset($_SESSION['kosik_dico']) ? $_SESSION['kosik_dico'] : '' ?>">
</div>


<h1>Adresa:</h1>
<label for="mesto">*Mesto:</label>
<input type="text" name="mesto" id="mesto" 
       value="<?php echo isset($_SESSION['kosik_mesto']) ? $_SESSION['kosik_mesto'] : ''; ?>">

<label for="ulica">*Ulica:</label>
<input type="text" name="ulica" id="ulica" 
       value="<?php echo isset($_SESSION['kosik_ulica']) ? $_SESSION['kosik_ulica'] : ''; ?>">

<label for="psc">*PSČ:</label>
<input type="text" name="psc" id="psc" 
       value="<?php echo isset($_SESSION['kosik_psc']) ? $_SESSION['kosik_psc'] : ''; ?>">
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