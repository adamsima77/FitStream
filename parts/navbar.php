<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/navbar_links.php');?>
<?php use navbar\Navbar?>

<?php 
$nav = new Navbar();
$vypis_linkov = $nav->navbar_Links();
?>
<nav class = "menu">
    <a href="index.php" class = "logo"><h1 class>FitStream</h1></a>
    <ul>
        <?php foreach($vypis_linkov as $a):?>
            <a href="<?php echo $a['url'] ;?>"><li><?php echo htmlspecialchars($a['nazov']);?></li></a>
        <?php endforeach?>
          
    </ul>
    <div class = "pr">
       
        <?php
        $nav->overenieUzivatela();
        ?>
        <a href = "kosik.php"><i class="fa fa-shopping-cart" id = "shopping_cart" style = "font-size: 20px;"></i></a>
        </div>
        <div class="hamburger" id="hamburger">

        <i class="fa fa-bars"></i>

    </div>
  </div>
</nav>




