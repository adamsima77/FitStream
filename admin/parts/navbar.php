<nav class = "menu">
<a href="edit_vyziva.php" class = "logo"><h1 class>FitStream</h1></a>

<ul>
<a href="edit_vyziva.php"><li>Editovanie produktov</li></a>
<a href="edit_akordeon.php"><li>Editovanie akordeónu</li></a>
<a href="../config/logout.php"><li>Odhlásenie</li></a>
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

