<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/uzivatel_session.php');?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $meno = $_POST['meno'];
    $priezvisko = $_POST['priezvisko'];
    $email = $_POST['email_registracia'];
    $heslo = $_POST['heslo'];
    $zopakovanie_hesla = $_POST['zopakovanie_hesla'];
    $datum = $_POST['datum'];

    if (empty($meno) || empty($priezvisko) || empty($email) || empty($heslo) || empty($zopakovanie_hesla) || empty($datum)) {
        $_SESSION['neuspech'] = "Prázdne textové polia.";
        header("Location: /FitStream/register.php");
        die;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        $_SESSION['neuspech'] = "Zadali ste zlý formát emailu.";
        header("Location: /FitStream/register.php");
        die;

    } else {
      
    try{

        $uzivatel->registraciaUzivatela($meno,$priezvisko,$email,$heslo,$zopakovanie_hesla,$datum);
    } catch(Exception $e) {

        $_SESSION['neuspech'] = "Nastala neočakávaná chyba.";
        header("Location: /FitStream/register.php");
        die;
      }
    }
}
?>
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