<?php include_once "classes/navbar_links.php"; ?>
<?php use navbar\navbar?>

<?php 

$nav = new navbar();
$vypis_linkov = $nav->navbar_links();

?>
<nav class = "menu">

<a href="index.php" class = "logo"><h1 class>FitStream</h1></a>

<ul>

         <?php foreach($vypis_linkov as $a):?>
            <a href="<?php echo $a['url'] ;?>"><li><?php echo htmlspecialchars($a['nazov']);?></li></a>
           <?php endforeach?>
</ul>

<div class = "pr">

<a href = "login.php"><i class="fa fa-user" style = "font-size: 20px;" id = "log"></i></a>
<a href = "kosik.php"><i class="fa fa-shopping-cart" id = "shopping_cart" style = "font-size: 20px;"></i></a>
</div>
<div class="hamburger" id="hamburger">

<i class="fa fa-bars"></i>

  </div>
  </div>
</nav>




