<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\KategoriaBlog\KategoriaBlog;
$kategoria_blog = new KategoriaBlog();


    $kategoria_vypis = $kategoria_blog->kategoriaBlogVypis();

?>

<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>
<?php include "parts/uprava_kategoria_blog.php"?>
<?php include "parts/footer.php"; ?>