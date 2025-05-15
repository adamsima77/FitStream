<?php use FitStream\Footer\Footer;?>
<?php 
$footer = new Footer();
$footer_vypis = $footer->footerVypis();
?>

<footer>
    <div class = "bottom_footer">
        <div class = "footer_rights"><p class = ""> &copy; <span id="year"></span>FitStream. <?php echo(date("Y")); ?> All rights reserved.</p></div>
            <div class = "social_media_links">

                <?php foreach($footer_vypis as $a): ?>
                    <a href="<?php echo $a['url']; ?>"  class="social"
                  
                    style="background-color: <?php echo $a['farba_bg']; ?>;
                    color: <?php echo $a['farba_ikony']; ?>">
                   <i class="<?php echo $a['ikona']; ?>" style="font-size: 20px;"></i>
                
                   </a>
                <?php endforeach; ?>
         </div>
            </div>

</footer>

<?php $nazov = basename($_SERVER['SCRIPT_NAME']);?>
    <?php $utilities->rozdelenieJavascriptu($nazov);?>
</body>
</html>