<?php
$vypis_vyziva = $vypis->vypis_vyziva();
?>

<div class="vyziva_skupina" id="vyziva_skupina">
    <?php foreach($vypis_vyziva as $a): ?>
        <div class="box_vyziva">
            <div class="obrazok_vyziva">
                <a href = "produkt.php?id=<?php echo htmlspecialchars($a['idprodukty'])?>"><img src="<?php echo htmlspecialchars($a['img_hlavna']);?>" alt="<?php  $b = (!($a['img_alt'] == null)) ? htmlspecialchars($a['img_alt']) : ""; echo $b; ?>">
                </a>
            </div>
            <div class="nadpis_vyziva">   
                <a href = "produkt.php?id=<?php echo htmlspecialchars($a['idprodukty'])?>"><h2><?php echo htmlspecialchars($a['nazov']); ?></h2>
                </a>
                <p><?php echo htmlspecialchars(substr($a['hlavny_popis'], 0, 175)); ?></p>
                <p class="cena_vyziva"><?php echo htmlspecialchars($a['cena']); ?>€</p>
            </div>
        </div>
    <?php endforeach;?>
</div>
</div>
</div>