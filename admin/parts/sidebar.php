
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
        <a href="dashboard.php"><li>Dashboard</li></a>
        </ul>
       

        </div>
    </div>
    </div>