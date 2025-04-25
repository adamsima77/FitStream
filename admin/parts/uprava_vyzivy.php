<div class = "vyziva_obal">
    <div class = "obal">
        <?php $vypis_Produktov->zobrazenieStavu()?>
        <a href="<?php echo BASE_URL; ?>admin/vytvorenie/vytvorenie_produktu.php" class="vytvorenie">Vytvoriť nový produkt</a>
        
        <div class = "filtre">
        <?php $vypis_kategorii = $vypis_Produktov->vypisKategorie();?>
        <?php foreach($vypis_kategorii as $kategoria):?>
          <?php $id_pod =  $kategoria['idkategorie'];?>
         <a href = "?id=<?php echo $id_pod;?>" style = "background-color: <?php echo $b = (isset($_GET['id']) && $_GET['id'] == $id_pod) ? "#2F3C7E;" : 
               "#2f52ff"; ?>;"><?php echo $kategoria['nazov_kategorie'];?></a>
                <?php endforeach;?>

        <?php if (isset($_GET['id'])):?>
            <a href = "http://localhost/FitStream/admin/edit_vyziva.php" style = "background-color: red; margin-left:auto;">Odstrániť vybratý filter</a>
        <?php endif;?>

</div>
        <div class = "table_con">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Názov produktu</th>
                    <th>Značka</th>
                    <th>Fotka</th>
                    <th>Popis fotky</th>
                    <th>Hlavný popis</th>
                    <th>Počet kusov</th>
                    <th>Cena</th>
                    <th>Kategória</th>
                    <th>Podkategória</th>
                    <th>Dátum vytvorenia</th>
                    <th>Dátum úpravy</th>
                    <th>Akcie</th>
                 </tr>
             
                  
                 <?php foreach($filter as $produkt):?>
                 
                     <tr>
                         <?php $id = $produkt['idprodukty'];?>
                         <?php $vypis_kategorii = $vypis_Produktov->spracovanieKategorii($id);?>
                         <td><?php echo $id;?></td>
                         <td><?php echo $produkt['nazov'];?></td>
                         <td><?php echo $produkt['znacka'];?></td>
                         <td><img src="<?php echo BASE_URL . $produkt['img_hlavna']?>"></td>
                         <td><?php echo $produkt['img_alt'];?></td>
                         <td><?php echo substr($produkt['hlavny_popis'],0,180);?>...</td>
                         <td><?php echo $produkt['pocet_kusov'];?></td>
                         <td><?php echo $produkt['cena'];?></td>
                         <td><?php echo $vypis_kategorii['kategorie']['nazov_kategorie'];?></td>
                         <td><?php echo $vypis_kategorii['podkategorie']['nazov_kategorie']?></td>
                         <td><?php echo $produkt['datum_vytvorenia'];?></td>
                         <td><?php echo $produkt['datum_upravy'];?></td>
                         <td><a href = "<?php echo BASE_URL; ?>admin/editovanie/editovanie_produktu.php?id=<?php echo $id;?>" class = "edit">Editovať</a> <a href = "<?php echo BASE_URL; ?>admin/vymazanie/vymazanie_produktu.php?id=<?php echo $id;?>" class = "delete" onclick = "return kontrolaVymazania()">Vymazať</a></td>
                     </tr>
                 <?php endforeach;?>

        </table>
    </div>
</div>