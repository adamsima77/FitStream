<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/uzivatel_session.php';?>
<?php 
    use FitStream\Blog\Blog;
    $blog = new Blog();

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $vypis_blog = $blog->blogClanok($_GET['id']);
    } else {
        die("Zlé ID.");
    }
    ?>
    
<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php require 'parts/sidebar.php'; ?>

<body class = "blog_clanok">

<div class="clanok_zaobalenie">
  <div class="clanok_z">

     <h1 class = "clanok_nadpis"><?php echo $vypis_blog['nazov'];?></h1>
     <img src = "<?php echo $vypis_blog['img_blog'];?>" alt = "" class = "clanok_img">
     <hr class = "pod_clanok">
     <p class = "clanok_popis"><?php echo $vypis_blog['popis'];?></p>
          
</div>
  
  </div>
</div>

<?php include "parts/footer.php"; ?>