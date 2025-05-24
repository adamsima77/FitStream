<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/kontrola_parts.php');?>
<?php
$vypis_slideshow = $slideshow->slideshowVypis();
$pocet = 0;
?>
<div class = "carousel-container">
    <div class="slideshow">     

        <?php foreach($vypis_slideshow as $a):?>
            <div class="fotky">
            <a href="<?php echo $a['img_preklik']; ?>">
            <img src="<?php echo $a['img_url']; ?>">
            </a>
            </div>
            <?php $pocet += 1; ?>
        <?php endforeach?>
        <div class = "prepnutie_fotiek">
        <?php for($i = 1; $i <= $pocet; $i++): ?>
            <span class="prepnutie" onclick="aktualnySnimok(<?php echo $i; ?>)"></span>
        <?php endfor; ?>
        </div>
    </div>
</div>