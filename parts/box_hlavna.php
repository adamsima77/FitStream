<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/kontrola_parts.php');?>
<div class = "za_1">         
    <h1><a href = "vyziva.php" class = "produkty">Produkty</a></h1>
        <div class = "skup" id = "skupi">
            <?php foreach($vypis as $a):?>
                <div class = "box">
                    <div class = "kontainer_hlavny_box">
                    <div class = "obrazok">

                        <a href = "produkt.php?id=<?php echo $a['idprodukty']?>"><img src="<?php echo $a['img_hlavna']; ?>" alt="<?php echo $a['img_alt'] ?? ''; ?>"></a>
                    </div>
                    <div class = "nadpis">
     
                        <a href = "produkt.php?id=<?php echo $a['idprodukty']?>"><h2><?php echo substr($a['nazov'],0,55);?></h2></a>
                        <p class = "box_popis"><?php echo substr($a['hlavny_popis'],0,85)?>...</p>
                        <p class = "cena"><?php echo $a['cena'];?>€</p>
                    </div>
            </div>

        </div>
            <?php endforeach?>
</div>