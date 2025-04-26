<?php 
$vypis = $vypis_na_hlavnej->vypisHlavna();

?>
<div class = "za_1">         
    <h1><a href = "vyziva.php" class = "produkty">Produkty</a></h1>
        <div class = "skup" id = "skupi">
            <?php foreach($vypis as $a):?>
                <div class = "box">
                    <div class = "kontainer_hlavny_box">
                    <div class = "obrazok">

                        <a href = "produkt.php?id=<?php echo htmlspecialchars($a['idprodukty'])?>"><img src="<?php echo htmlspecialchars($a['img_hlavna']); ?>" alt="<?php echo htmlspecialchars($a['img_alt'] ?? ''); ?>"></a>
                    </div>
                    <div class = "nadpis">
     
                        <a href = "produkt.php?id=<?php echo htmlspecialchars($a['idprodukty'])?>"><h2><?php echo htmlspecialchars(substr($a['nazov'],0,55));?></h2></a>
                        <p class = "box_popis"><?php echo htmlspecialchars(substr($a['hlavny_popis'],0,85))?>...</p>
                        <p class = "cena"><?php echo htmlspecialchars($a['cena']);?>€</p>
                    </div>
            </div>

        </div>
            <?php endforeach?>
</div>