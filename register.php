<?php require 'parts/header.php';?>
<body>

<form action="" class = "forma_registracia"  name = "">
        <div class = "registracia">
        <h1>Registrácia</h1>
        <label for = "meno">Meno:</label>
        <input type="text" id = "meno" placeholder="Zadajte meno...">
        <label for = "priezvisko">Priezvisko:</label>
        <input type="text" id = "priezvisko" placeholder="Zadajte priezvisko...">
        <label>E-mail:</label>
        <input type="email" id = "em" placeholder="Zadajte email v tvare email@email.com...s">
        <label for = "hes">Heslo:</label>
        <input type="password" id="hes" placeholder="Zadajte heslo...">
        <label for = "zop_hes">Zopakujte Heslo:</label>
        <input type="password" id="zop_hes" placeholder="Zadajte znova heslo...">
        <label>
        <input type = "checkbox" id = "check_log" onclick="ukaz_hes()" class = "check_registracia">Zobraziť heslo
    </label>
       
         <a href = "login.php">Ste zaregistrovaný ? Prihláste sa</a>
        <input type="submit" value="Zaregistrovať" class = "registracia_sub">
    </div>

    </form>

<script src="javascript/app.js" type="text/javascript"></script>
</body>
</html>