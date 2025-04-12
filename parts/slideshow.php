<?php include_once "classes/slideshow_vypis.php"; ?>
<?php use slideshow\slideshow?>
<?php
$slideshow = new slideshow();
$vypis_slideshow = $slideshow->slideshow_vypis();
$pocet = 0;
?>
<div class = "carousel-container">
<div class="slideshow">     

        <?php foreach($vypis_slideshow as $a):?>
            <div class="fotky">
              <a href=""><img src="<?php echo $a['img_url'];?>"></a>
             
            </div>
        <?php $pocet += 1; ?>
        <?php endforeach?>

            <div class = "prepnutie_fotiek">
            <?php for($i = 0; $i < $pocet; $i++): ?>
            <span class="prepnutie" onclick="aktualnySnimok(<?php echo $i; ?>)"></span>
            <?php endfor; ?>
                      
              </div>
            
            </div>
</div>