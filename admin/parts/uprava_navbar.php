<div class = "vyziva_obal">
<a href = "vytvorenie_navbar.php">Vytvoriť novú otázku a odpoveď</a>
<table>
  <tr>
    <th>ID</th>
    <th>Názov</th>
    <th>URL</th>
    <th>Akcia</th>
  </tr>

  <?php foreach($vypis_navbar as $polozka_navbar):?>
  <tr>
    <?php $id = $polozka_navbar['idnavbar'];?> 
    <td><?php echo $id ?></td>
    <td><?php echo $polozka_navbar['nazov'];?></td>
    <td><?php echo $polozka_navbar['url'];?></td>
    <td><a href="editovanie_navbaru.php?id=<?php echo $id;?>">Editovať</a> <a href = "vymazanie_navbar.php?id=<?php echo $id;?>">Vymazať</a></td>
</tr>
<?php endforeach;?>

</table>
</div>