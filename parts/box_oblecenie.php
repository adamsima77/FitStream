<div class="vyziva_skupina_oblecenie" id="vyziva_skupina_oblecenie">
    <?php foreach($filter as $vypis): ?>
        <div class="box_vyziva_oblecenie">
            <div class="obrazok_vyziva_oblecenie">
                <a href = "produkt.php?id=<?php echo htmlspecialchars($vypis['idprodukty'])?>"><img src="<?php echo htmlspecialchars($vypis['img_hlavna']); ?>" alt="<?php  $b = (!($vypis['img_alt'] == null)) ? htmlspecialchars($vypis['img_alt']) : ""; echo $b;?>"></a>
            </div>
            <div class="nadpis_vyziva_oblecenie">
                <a href = "produkt.php?id=<?php echo htmlspecialchars($vypis['idprodukty'])?>"><h2><?php echo htmlspecialchars($vypis['nazov']); ?></h2></a>
                <p><?php echo htmlspecialchars(substr($vypis['hlavny_popis'], 0, 175)); ?>...</p>
                <p class="cena_vyziva_oblecenie"><?php echo htmlspecialchars($vypis['cena']);?>€</p>
        </div>
            </div>
  <?php endforeach; ?>
            </div>
  </div> 
</div>
