<?php include_once "classes/vypis_vyziva.php"; ?>
<?php use vypis_vyziva\vypis_vyziva?>

<?php
$vypis = new vypis_vyziva();
$vypis_vyziva = $vypis->vypis_vyziva();
?>

<div class="vyziva_skupina" id="vyziva_skupina">
    <?php foreach($vypis_vyziva as $a): ?>
        <div class="box_vyziva">
            <div class="obrazok_vyziva">
   
            <a href = "produkt.php?id=<?php echo $a['idprodukty']?>"><img src="<?php echo $a['img_url'];?>" alt="<?php  $b = (!($a['img_alt'] == null)) ? $a['img_alt'] : ""; echo $b; ?>">
                </a>
            </div>
            <div class="nadpis_vyziva">
                
            <a href = "produkt.php?id=<?php echo $a['idprodukty']?>"><h2><?php echo $a['nazov']; ?></h2>
                </a>
                <p><?php echo substr($a['popis'], 0, 175); ?></p>
                <p class="cena_vyziva"><?php echo $a['cena']; ?>€</p>
            </div>
        </div>
    <?php endforeach;?>
</div>
</div></div>