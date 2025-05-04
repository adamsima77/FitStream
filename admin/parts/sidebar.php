<div class = "sidebar" id = "sidebar">
    <div class = "sidebar_zarovnanie">
        <div class = "logo_a_zatvorenie">
            <a href = "edit_vyziva.php" id = "logo"><h1>FitStream</h1></a>
            <i class = "fa fa-close" id = "zatvorit_sidebar" onclick = "zatvorit_sidebar()"></i>
        </div>  
        <div class = "con"> 
            <div class = "ds">
                <p><?php echo $overenie_admina->getAdmin();?></p>
                <p><?php echo $overenie_admina->getadminRola()?></p>
             </div>
             <ul>
             <a href="<?php echo BASE_URL; ?>admin/edit_vyziva.php"><li>Produkty</li></a>
             <a href="<?php echo BASE_URL; ?>admin/edit_akordeon.php"><li>Akordeón</li></a>
             <a href="<?php echo BASE_URL; ?>admin/edit_footer.php"><li>Footer</li></a>
             <a href="<?php echo BASE_URL; ?>admin/edit_navbar.php"><li>Navbar</li></a>
             <a href="<?php echo BASE_URL; ?>admin/edit_blog.php"><li>Blog</li></a>
             <a href="<?php echo BASE_URL; ?>admin/edit_doprava.php"><li>Doprava</li></a>
             <a href="<?php echo BASE_URL; ?>admin/edit_platba.php"><li>Platba</li></a>
             <a href="<?php echo BASE_URL; ?>admin/edit_kategoria_blog.php"><li>Kategórie blog</li></a>
             <a href="<?php echo BASE_URL; ?>admin/edit_kategoria_produkt.php"><li>Kategórie produktov</li></a>
             <a href="<?php echo BASE_URL; ?>config/logout.php"><li>Odhlásenie</li></a>
             </ul>
       
        </div>
    </div>
</div>