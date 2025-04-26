<div class = "vyziva_obal">
    <div class = "obal">
        <?php $blog->zobrazenieStavu()?>
            <a href="<?php echo BASE_URL; ?>admin/vytvorenie/vytvorenie_blog.php" class="vytvorenie">Vytvoriť nový článok</a>
            <div class = "filtre">
        <?php $vypis_blog = $blog->vypisKategorii();?>
        <?php foreach($vypis_blog as $kategoria):?>
          <?php $id_pod =  $kategoria['id_kategorie'];?>
         <a href = "?id=<?php echo $id_pod;?>" style = "background-color: <?php echo $b = (isset($_GET['id']) && $_GET['id'] == $id_pod) ? "#2F3C7E;" : 
               "#2f52ff"; ?>;"><?php echo $kategoria['nazov_kategorie_blog'];?></a>
                <?php endforeach;?>

        <?php if (isset($_GET['id'])):?>
            <a href = "http://localhost/FitStream/admin/edit_blog.php" style = "background-color: red; margin-left:auto;">Odstrániť vybratý filter</a>
        <?php endif;?>

</div>
            
            <table>
                <tr>
                    <th>ID</th>
                    <th>Názov</th>
                    <th>Popis</th>
                    <th>Fotka</th>
                    <th>Popis fotky</th>
                    <th>Autor</th>
                    <th>Kategória</th>
                    <th>Akcia</th>
                </tr>
                <?php foreach($filter as $polozka):?>
                   
                    <tr>
                        <?php $id = $polozka['idblog'];?>
                        <?php $vypis_uzivatel = $blog->vypisAutora($id);?> 
                        <?php $vypis_kategoria = $blog->vypisKategorie($id);?> 
                        <td><?php echo $id ?></td>
                        <td><?php echo $polozka['nazov'];?></td>
                        <td><?php echo substr($polozka['popis'],0,180);?>...</td>
                        <td><img src = "<?php echo BASE_URL .  $polozka['img_blog'];?>"></td>
                        <td><?php echo $polozka['img_alt'];?></td>
                        <td><?php echo $vypis_uzivatel['meno'] . ' ' .  $vypis_uzivatel['priezvisko'];?></td>
                        <td><?php echo $vypis_kategoria['nazov_kategorie_blog'];?></td>
                        <td><a href="<?php echo BASE_URL; ?>admin/editovanie/editovanie_blog.php?id=<?php echo $id;?>" class = "edit">Editovať</a> <a href = "<?php echo BASE_URL; ?>admin/vymazanie/vymazanie_blog.php?id=<?php echo $id;?>" onclick = "return kontrolaVymazania()" class = "delete">Vymazať</a></td>
                    </tr>
                <?php endforeach;?>

            </table>
    </div>
</div>