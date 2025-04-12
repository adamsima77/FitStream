<?php include "parts/header.php";?>
<?php include "parts/navbar.php"; ?>
<?php require 'parts/sidebar.php';?>
<?php include_once "classes/produkt_detail.php"; ?>
<?php use produkt\ProduktDetail?>

<?php 
$p = new ProduktDetail();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $produkt = $p->getProduktById($_GET['id']);
} else {
    die("Neplatné ID produktu.");
}

?>
<body>
    <h1><?php echo $produkt['nazov']; ?></h1>
    <img src="<?php echo $produkt['img_url']; ?>" alt="<?php echo $produkt['img_alt']; ?>">
    <p><?php echo $produkt['popis']; ?></p>
    <p><strong>Cena: </strong><?php echo $produkt['cena']; ?> €</p>
</body>




<?php include "parts/footer.php";?>