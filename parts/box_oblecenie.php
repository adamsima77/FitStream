<div class="vyziva_skupina_oblecenie" id="vyziva_skupina_oblecenie">
    <?php foreach($filter as $vypis): ?>
        <div class="box_vyziva_oblecenie">
            <div class="obrazok_vyziva_oblecenie">
                <a href = "produkt.php?id=<?php echo $vypis['idprodukty']?>"><img src="<?php echo $vypis['img_hlavna']; ?>" alt="<?php  $b = (!($vypis['img_alt'] == null)) ? $vypis['img_alt'] : ""; echo $b;?>"></a>
            </div>
            <div class="nadpis_vyziva_oblecenie">
                <a href = "produkt.php?id=<?php echo $vypis['idprodukty']?>"><h2><?php echo substr($vypis['nazov'],0,34); ?>...</h2></a>
                <p><?php echo substr($vypis['hlavny_popis'], 0, 175); ?>...</p>
                <p class="cena_vyziva_oblecenie"><?php echo $vypis['cena'];?>€</p>
        </div>
            </div>
  <?php endforeach; ?>
            </div>
  </div> 
</div>
