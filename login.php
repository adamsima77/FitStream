<?php require 'parts/header.php';?>
<body>

<?php $uzivatel->zobrazenieStavu()?>
<form action="" method = "POST" class = "forma_prihlasenie"  name = "">
    <div class = "prihlasenie">
        <h1>Prihlásenie</h1>
        <label class = "l_em">E-mail:</label>
        <input type="email" id = "email" name = "email" placeholder="Zadajte email">
        <label class = "l_hes">Heslo:</label>
        <input type="password" id="heslo_1" name = "heslo_1" placeholder="Zadajte heslo">
        <label>
        <input type = "checkbox" id = "check_log" onclick="ukaz_heslo()" class = "check_login">Zobraziť heslo
        </label>
        <a href = "Register.php">Nie ste zaregistrovaný ? Zaregistrujte sa</a>
        <input type="submit" value="Prihlásiť" class = "prihlasenie_sub">
    </div>

</form>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $heslo = $_POST['heslo_1'];
    if (empty($email) || empty($heslo)) {
        echo "Prázdne polia";
    } else {
      
      try { 
          $uzivatel->uzivatelPrihlasenie($email, $heslo);
      } catch (Exception $e) {
          die("Nastala chyba: " . $e->getMessage());
      }
           }
    }
?>

<script src="javascript/app.js" type="text/javascript"></script>
</body>
</html>