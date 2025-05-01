<nav class = "menu">
    <a href="<?php echo BASE_URL;?>admin/edit_vyziva.php" class = "logo"><h1 class>FitStream</h1></a>
    <ul>
    <a href="<?php echo BASE_URL; ?>admin/edit_vyziva.php"><li>Produkty</li></a>
    <a href="<?php echo BASE_URL; ?>admin/edit_blog.php"><li>Blog</li></a>
    <div class="dropdown">
  <button class="dropbtn">Časti stránky</button>
  <div class="dropdown-content">
  <a href="<?php echo BASE_URL; ?>admin/edit_akordeon.php"><li>Akordeón</li></a>
  <a href="<?php echo BASE_URL; ?>admin/edit_footer.php"><li>Footer</li></a>
  <a href="<?php echo BASE_URL; ?>admin/edit_navbar.php"><li>Navbar</li></a>
  <a href="<?php echo BASE_URL; ?>admin/edit_slideshow.php"><li>Slideshow</li></a>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">Objednávky</button>
  <div class="dropdown-content">
  <a href="<?php echo BASE_URL; ?>admin/edit_doprava.php"><li>Doprava</li></a>
   
  </div>
</div>
        
       
        <a href="<?php echo BASE_URL; ?>config/logout.php"><li>Odhlásenie</li></a>
    </ul>
    <div class = "pr">
        <p><?php echo $overenie_admina->getAdmin();?></p>
        <p><?php echo $overenie_admina->getadminRola()?></p>

    </div>
    <div class="hamburger" id="hamburger">
        <i class="fa fa-bars"></i>
    </div>
    </div>
</nav>

