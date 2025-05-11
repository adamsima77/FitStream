<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Blog\Blog;
$blog = new Blog();



$filter = [];
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $filter = $blog->filtrovanie($_GET['id']);
} else {
    $filter = $blog->blogVypis();
}
?>

<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>
<?php include "parts/uprava_blog.php"?>
<?php include "parts/footer.php"; ?>