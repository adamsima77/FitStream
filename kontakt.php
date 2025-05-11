<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/uzivatel_session.php');?>
<?php use FitStream\Akordeon\Akordeon;?>



<?php $akordeon = new Akordeon();?>
<?php $vypis_a = $akordeon->vypisAkordeon();?>

<?php include "parts/header.php";?>
<?php include "parts/navbar.php";?>
<?php require 'parts/sidebar.php';?>

<div class = "zarovnanie_kontakt">
    <div class = "za_kontakt">
        <h1 class = "kontakt_nadpis"></h1>
    <div class="banner">
        <h2>Máte akékoľvek otázky alebo potrebujete pomoc? Sme tu pre vás!</h2>
        <p>Neváhajte nás kontaktovať, či už ohľadom našich produktov, objednávok alebo akýchkoľvek ďalších informácií. Náš tím je pripravený vám pomôcť a zabezpečiť, aby vaše nákupy u nás boli čo najpríjemnejšie.</p>
        <p><strong>Ako nás môžete kontaktovať:</strong></p>
        <p>1. E-mail: Pre rýchlu odpoveď nás môžete kontaktovať na našej e-mailovej adrese:<br>📧 info@fitstream.sk</p>
        <p>2. Telefón: Máte otázky, ktoré si vyžadujú osobný kontakt? Zavolajte nám na:<br>📞 +421 123 456 789</p>
        <p>3. Kontaktný formulár: Ak preferujete pohodlný spôsob, ako nám napísať, využite náš kontaktný formulár nižšie. Stačí vyplniť svoje údaje a my sa vám ozveme v čo najkratšom čase.</p>
        <p>4. Naše predajne: Navštívte nás aj osobne! Máme predajňu na týchto adresách:<br>FitStream Bratislava – Príkladná 12, 821 02 Bratislava<br>FitStream Košice – Sportová 4, 040 01 Košice</p>
        <p>5. Sociálne siete: Sledujte nás na sociálnych sieťach a získejte najnovšie novinky, akcie a tipy:<br>Facebook: FitStream.sk<br>Instagram: @fitstream.sk</p>
        <p><strong>Otváracie hodiny:</strong><br>
        Pondelok – Piatok: 9:00 – 18:00<br>
        Sobota: 10:00 – 14:00<br>
        Nedeľa: Zatvorené</p>
    </div>


<?php include "parts/akordeon.php"?>

    </div>
</div>

<?php include "parts/footer.php";?>