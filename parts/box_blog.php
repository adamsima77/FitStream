<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/kontrola_parts.php');?>
<h1><a href =  "blog.php" class = "blog">Blog</a></h1>

<div class = "skupina" id = "skupina_recepty">

<?php foreach($vypis_blog as $polozka):?>
<div class = "box_pre_clanky">
<div class = "obrazok_v_clankoch">
    
    <a href = "blog_clanok.php?id=<?php echo $polozka['idblog'];?>"><img src="<?php echo $polozka['img_blog'];?>" alt=""></a>
</div>
<div class = "popis_a_nadpis">
<div class = "nadpis_clanky">
     
    <a href = "blog_clanok.php?id=<?php echo $polozka['idblog'];?>"><h2><?php echo substr($polozka['nazov'],0,50);?>...</h2></a>
</div>

<div class = "popis_clanky">
 
<p><?php echo substr(strip_tags($polozka['popis']),0,400);?>...</p>
</div>

</div>
</div>
<?php endforeach;?>
</div>
</div>