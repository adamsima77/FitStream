<div class = "vyziva_obal">
<div class = "obal">
<a href = "vytvorenie_footer.php" class = "vytvorenie">Vytvoriť novú otázku a odpoveď</a>
<table>
  <tr>
    <th>ID</th>
    <th>Ikona</th>
    <th>Farba pozadia</th>
    <th>Farba ikony</th>
    <th>URL</th>
    <th>Akcia</th>
  </tr>

  <?php foreach($vypis_footer as $polozka_footer):?>
  <tr>
    <?php $id = $polozka_footer['idfooter'];?> 
    <td><?php echo $id ?></td>
    <td><?php echo $polozka_footer['ikona'];?></td>
    <td><?php echo $polozka_footer['farba_bg'];?></td>
    <td><?php echo $polozka_footer['farba_ikony'];?></td>
    <td><?php echo $polozka_footer['url'];?></td>
    <td><a href="editovanie_footeru.php?id=<?php echo $id;?>" class = "edit">Editovať</a> <a href = "vymazanie_footer.php?id=<?php echo $id;?>" class = "delete">Vymazať</a></td>
</tr>
<?php endforeach;?>

</table>
</div>
</div>