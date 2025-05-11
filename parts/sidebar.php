<?php use FitStream\Navbar\Navbar;?>

<?php 
$nav = new Navbar();
$vypis_linkov = $nav->navbarLinks();
?>
<div class = "sidebar" id = "sidebar">
    <div class = "sidebar_zarovnanie">
        <div class = "logo_a_zatvorenie">
            <a href = "index.php" id = "logo"><h1>FitStream</h1></a>
            <i class = "fa fa-close" id = "zatvorit_sidebar" onclick = "zatvorit_sidebar()"></i>
        </div>  
            <div class = "con">
                <div class = "ds">
                <?php $nav->overenieUzivatela();?>
                <a href = "kosik.php"><i class="fa fa-shopping-cart" id = "shopping_cart" style = "font-size: 20px;"></i></a>
                <?php $objednavky->zobrazeniePoctu()?>
                </div> 
    <ul>
        <?php foreach($vypis_linkov as $a):?>
            <a href="<?php echo BASE_URL . $a['url'] ;?>"><li><?php echo htmlspecialchars($a['nazov']);?></li></a>
            <?php endforeach?>
            <?php $nav->navratDoAdmina();?>
    </ul>
            </div>
     </div>
</div>