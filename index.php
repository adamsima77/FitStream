<?php include 'parts/header.php';?>
<?php include 'parts/navbar.php';?>
<?php require 'parts/sidebar.php';?>
<?php include_once "classes/produkt.php"; ?>
<?php include_once "classes/slideshow_vypis.php"; ?>
<?php use slideshow\slideshow?>
<?php use produkt\Produkt?>

<?php $slideshow = new slideshow();
$vypis_na_hlavnej = new Produkt();
?>
<body>

<?php include_once "parts/slideshow.php"?>

<?php include_once "parts/box_hlavna.php"?>
    



<!-- !!!!!!BLOG!!!!!   -->



<h1><a href =  "blog.php" class = "blog">Blog</a></h1>

<div class = "skupina" id = "skupina_recepty">
<div class = "box_pre_clanky">
<div class = "obrazok_v_clankoch">
     <!--Obrázok-->
    <a href = ""><img src="img/proteiny.jpg" alt=""></a>
</div>
<div class = "nadpis_clanky">
     <!--Nadpis-->
    <a href = ""><h2>Nadpis</h2></a>
</div>

<div class = "popis_clanky">
 <!--Popis k článkom-->
<p>asdasdsadasdasdasdsadasdasdasds
  adasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasd
  asdasdsadasdasdasdsadasdasdasds
  adasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasd
 
</p>

</div>

</div>
<div class = "box_pre_clanky">
<div class = "obrazok_v_clankoch">
     <!--Obrázok-->
    <a href = ""><img src="img/proteiny.jpg" alt=""></a>
</div>
<div class = "nadpis_clanky">
     <!--Nadpis-->
    <a href = ""><h2>Nadpis</h2></a>
</div>

<div class = "popis_clanky">
 <!--Popis k článkom-->
<p>asdasdsadasdasdasdsadasdasdasds
  adasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasd
  asdasdsadasdasdasdsadasdasdasds
  adasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasd
 
</p>

</div>

</div>
<div class = "box_pre_clanky">
<div class = "obrazok_v_clankoch">
     <!--Obrázok-->
    <a href = ""><img src="img/proteiny.jpg" alt=""></a>
</div>
<div class = "nadpis_clanky">
     <!--Nadpis-->
    <a href = ""><h2>Nadpis</h2></a>
</div>

<div class = "popis_clanky">
 <!--Popis k článkom-->
<p>asdasdsadasdasdasdsadasdasdasds
  adasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasd
  asdasdsadasdasdasdsadasdasdasds
  adasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasd
 
</p>

</div>

</div>
<div class = "box_pre_clanky">
<div class = "obrazok_v_clankoch">
     <!--Obrázok-->
    <a href = ""><img src="img/proteiny.jpg" alt=""></a>
</div>
<div class = "nadpis_clanky">
     <!--Nadpis-->
    <a href = ""><h2>Nadpis</h2></a>
</div>

<div class = "popis_clanky">
 <!--Popis k článkom-->
<p>asdasdsadasdasdasdsadasdasdasds
  adasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasd
  asdasdsadasdasdasdsadasdasdasds
  adasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasd
 
</p>

</div></div>
</div>


</div>





<?php include 'parts/footer.php';?>
    
