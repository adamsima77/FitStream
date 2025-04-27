<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/uzivatel_session.php');?>

<?php include_once "classes/Blog.php"; ?>
<?php use blog\Blog?>

<?php 
$blog = new Blog();
$vypis_kategorii = $blog-> vypisKategorii();
?>


<?php
$filter = [];
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $filter = $blog->filtrovanie($_GET['id']);
} else {
    $filter = $blog->blogVypis();
}
?>


<?php include "parts/header.php";?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php";?>

<div class = "b_pos">
<div class = "zaobalenie_blog">
<div class = "zaobalenie_1_blog">

<h1 class = "Nadpis_blog">Najnovšie informácie o výžive a zdravom životnom štýle.</h1>

<div class = "kategorie_blog">

<?php foreach($vypis_kategorii as $kategoria):?>
    <?php $id_pod =  $kategoria['id_kategorie'];?>
    <a href = "?id=<?php echo $id_pod;?>" style = "background-color: <?php echo $b = (isset($_GET['id']) && $_GET['id'] == $id_pod) ? "#2F3C7E;" : 
    "#2f52ff";?>"><?php echo $kategoria['nazov_kategorie_blog'];?></a>
<?php endforeach;?>
<?php if (isset($_GET['id'])):?>
    <a href = "http://localhost/FitStream/blog.php" style = "background-color: red; margin-left:auto;">Odstrániť vybratý filter</a>
<?php endif;?>

</div>

<?php foreach($filter as $polozka):?>
<div class = "box_blog">
<a href="blog_clanok.php?id=<?php echo $polozka['idblog'];?>">
<img src="<?php echo $polozka['img_blog'];?>" alt="">
</a>
<div class = "nadpis_a_popis">
<h1><a href="blog_clanok.php?id=<?php echo $polozka['idblog'];?>"><?php echo $polozka['nazov'];?></a></h1>
<p><?php echo substr($polozka['popis'],0,250);?>...</p>

</div>
</div>
<hr class = "pod">
<?php endforeach;?>
</div>
</div>
<?php include "parts/footer.php"; ?>