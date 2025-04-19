<nav class = "menu">
    <a href="edit_vyziva.php" class = "logo"><h1 class>FitStream</h1></a>
    <ul>
        <a href="<?php echo BASE_URL; ?>admin/edit_vyziva.php"><li>Editovanie produktov</li></a>
        <a href="<?php echo BASE_URL; ?>admin/edit_akordeon.php"><li>Editovanie akordeónu</li></a>
        <a href="<?php echo BASE_URL; ?>admin/edit_footer.php"><li>Editovanie footeru</li></a>
        <a href="<?php echo BASE_URL; ?>admin/edit_navbar.php"><li>Editovanie navbaru</li></a>
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

