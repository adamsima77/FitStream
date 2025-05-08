<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/uzivatel_session.php');?>

<?php $uzivatel->overenieRegistracie();?>
<?php require 'parts/header.php';?>

<body>
<?php $uzivatel->zobrazenieStavu()?>
<form action="" method = "POST" class = "forma_registracia"  name = "">
    <div class = "registracia">
        <h1>Registrácia</h1>
        <label for = "meno">Meno:</label>
        <input type="text" id = "meno" name = "meno" placeholder="Zadajte meno">
        <label for = "priezvisko">Priezvisko:</label>
        <input type="text" id = "priezvisko" name = "priezvisko" placeholder="Zadajte priezvisko">
        <label>E-mail:</label>
        <input type="email" id = "email_registracia" name = "email_registracia" placeholder="Zadajte email">
        <label for = "heslo">Heslo:</label>
        <input type="password" id="heslo" name = "heslo" placeholder="Zadajte heslo">
        <label for = "zopakovanie_hesla">Zopakujte Heslo:</label>
        <input type="password" id="zopakovanie_hesla" placeholder="Zadajte znova heslo" name = "zopakovanie_hesla">
        <label class = "datum">Dátum narodenia:</label>
        <input type="date" name = "datum" id = "datum">
        </label>
        <label>
            <input type = "checkbox" id = "check_log" onclick="ukaz_hes()" class = "check_registracia">Zobraziť heslo
        </label>
        <a href = "login.php">Ste zaregistrovaný ? Prihláste sa</a>
        <input type="submit" value="Zaregistrovať" class = "registracia_sub">
    </div>
</form>



<script src="javascript/registracia.js" type="text/javascript"></script>
</body>
</html>