<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/navbar_links.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/Objednavky.php');?>
<?php use objednavky\Objednavky?>
<?php use navbar\Navbar?>

<?php $objednavky = new Objednavky();
     
     ?>

<?php 
$nav = new Navbar();
$vypis_linkov = $nav->navbar_Links();

?>
<nav class = "menu">
    <a href="<?php echo BASE_URL . "index.php";?>" class = "logo"><h1 class>FitStream</h1></a>
    <ul>
        <?php foreach($vypis_linkov as $a):?>
            <a href="<?php echo $a['url'] ;?>"><li><?php echo htmlspecialchars($a['nazov']);?></li></a>
        <?php endforeach?>
        <?php $nav->navratDoAdmina();?>
          
    </ul>
    <div class = "pr">
       
        <?php
        $nav->overenieUzivatela();
        ?>
        <a href = "<?php echo BASE_URL . "kosik.php";?>"><i class="fa fa-shopping-cart" id = "shopping_cart" style = "font-size: 20px;"></i></a>
       
        <?php $objednavky->zobrazeniePoctu()?>
       </div>
        <div class="hamburger" id="hamburger">

        <i class="fa fa-bars"></i>

    </div>
  </div>
</nav>




