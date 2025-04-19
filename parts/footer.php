<?php include_once(__DIR__ . '/../classes/footer_linky.php'); ?>
<?php use footer\Footer?>
<?php 
$footer = new Footer();
$footer_vypis = $footer->footer_Vypis();
?>

<footer>
    <div class = "bottom_footer">
        <div class = "footer_rights"><p class = ""> &copy; <span id="year"></span>FitStream. <?php echo(date("Y")); ?> All rights reserved.</p></div>
            <div class = "social_media_links">

                <?php foreach($footer_vypis as $a): ?>
                    <a href="<?php echo htmlspecialchars($a['url']); ?>">
                    <button class="social"
                    style="background-color: <?php echo htmlspecialchars($a['farba_bg']); ?>;
                    color: <?php echo htmlspecialchars($a['farba_ikony']); ?>;">
                   <i class="<?php echo htmlspecialchars($a['ikona']); ?>" style="font-size: 20px;"></i>
                   </button>
                   </a>
                <?php endforeach; ?>
         </div>
            </div>

</footer>

<script src="javascript/app.js" type="text/javascript"></script>
</body>
</html>