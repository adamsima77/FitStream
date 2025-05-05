<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/uzivatel_session.php');?>

<?php $uzivatel->overenieNastavenia($_SESSION['user_id'],$_GET['id']);?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/Objednavky.php');?>

<?php use objednavky\Objednavky?>
<?php use produkt\Produkt?>

<?php $objednavky = new Objednavky();
      $id_uzivatela = $_SESSION['user_id'];?>

<?php $nakupy = $objednavky->historiaNakupov($_SESSION['user_id']);?>

<?php if($_SERVER['REQUEST_METHOD'] === 'POST'){


     $email = $_POST['email'];
     $meno = $_POST['meno'];
     $priezvisko = $_POST['priezvisko'];

     if(empty($email) || empty($meno) || empty($priezvisko)){

        die("Prázdne polia.");
     } else{

       
        $uzivatel->editaciaUzivatela($email,$meno,$priezvisko,$id_uzivatela);
     }

}?>

<?php $vypis_uzivatela = $uzivatel->vypisUzivatela($id_uzivatela);?>


<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/header.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/navbar.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/sidebar.php');?>

<div class="nastavenia_zarovnanie">

     <h1>Úprava osobných údajov</h1>
     <form action="" method = "POST" class = "nastavenie_uprava_udajov">
     <label class = "email">E-mail:</label>
     <input type="email" id = "email" name = "email" class = "email" value = "<?php echo $vypis_uzivatela['email'];?>">
     
     <label class = "meno">Meno:</label>
     <input type="text" id = "meno" name = "meno" class = "meno" value = "<?php echo $vypis_uzivatela['meno'];?>">

     <label class = "priezvisko">Priezvisko:</label>
     <input type="text" id = "priezvisko" name = "priezvisko" class = "priezvisko" value = "<?php echo $vypis_uzivatela['priezvisko'];?>">

    
     <input type="submit" value="Upraviť">

     </form>

    <div class="nastavenia_z">
   
    <h1>História nákupov</h1>
    <?php if (empty($nakupy)):?>
          <h2>História nákupov je prázdna.</h2>
          <?php else:?>
        <?php foreach($nakupy as $produkt): ?>
            <div class="nastavenia_polozka">
                <div class="nastavenia_info">
                    <?php $idobjednavky = $produkt['idobjednavky'];?>
                    <p>Id objednávky: <?php echo $idobjednavky; ?></p>
                    <p>Cena objednávky: <?php echo $produkt['cena']; ?>€</p>
                    <p>Stav objednávky: <?php echo $produkt['status']; ?></p>
                    <p>Dátum a čas objednávky: <?php echo $produkt['datum_objednavky']; ?></p>
                </div>
                <?php $produkty = $objednavky->historiaProdukty($idobjednavky);?>
        
                <h1>Produkty v objednávke:</h1>
                
                <div class="produkt_list">
                   
                    <?php foreach($produkty as $p):?>
                        <?php $produkt_cena = $objednavky->getCena($p['idprodukty']);?>
                        <div class="produkt_polozka">
                            <img class="produkt_img" src="<?php echo BASE_URL . $p['img_hlavna'];?>" alt="<?php echo $p['img_alt'];?>">
                            <h2 class="produkt_nazov"><?php echo $p['nazov'];?></h2>
                           <?php $produk_cena = $objednavky->cenaProduktov($p['idprodukty'],$idobjednavky);?>
                            <p>Celková cena: <?php echo $produk_cena;?>€</p>
                            <p>Jednotková cena: <?php echo $produkt_cena;?>€</p>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        <?php endforeach; ?>
        <?php endif;?>
    </div>
</div>



<a href="vymazanie_uctu.php" onclick = "return overenieVymazaniaUctu()" class = "vymazanie_uctu">Vymazať účet</a>


<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/footer.php');?>