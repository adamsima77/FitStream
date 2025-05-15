<div class="vyziva_skupina_prislusenstvo" id="vyziva_skupina_prislusenstvo">
    <?php foreach($filter as $polozka): ?>
        <div class="box_vyziva_prislusenstvo">
            <div class="obrazok_vyziva_prislusenstvo">
                <a href = "produkt.php?id=<?php echo $polozka['idprodukty']?>"><img src='<?php echo $polozka['img_hlavna']; ?>' alt="<?php echo !empty($a['img_alt']) ? $polozka['img_alt'] : ''; ?>"></a>
            </div>
            <div class="nadpis_vyziva_prislusenstvo">
                <a href = "produkt.php?id=<?php echo $polozka['idprodukty']?>"><h2><?php echo substr($polozka['nazov'],0,34); ?>...</h2></a>
                <p><?php echo substr($polozka['hlavny_popis'], 0, 175); ?>...</p>
                <p class="cena_vyziva_prislusenstvo"><?php echo $polozka['cena']; ?>€</p>
            </div>

            </div>
    <?php endforeach; ?>
    </div>
</div>
</div>