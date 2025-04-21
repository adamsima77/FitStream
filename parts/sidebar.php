<?php include_once "classes/navbar_links.php"; ?>
<?php use navbar\Navbar?>

<?php 
$nav = new Navbar();
$vypis_linkov = $nav->navbar_Links();
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
    </div>
    <ul>
        <?php foreach($vypis_linkov as $a):?>
            <a href="<?php echo $a['url'] ;?>"><li><?php echo htmlspecialchars($a['nazov']);?></li></a>
            <?php endforeach?>
    </ul>
            </div>
     </div>
</div>