<div class = "vyziva_obal">
    <div class = "obal">
        <?php $vypis_Produktov->zobrazenieStavu()?>
        <a href="<?php echo BASE_URL; ?>admin/vytvorenie/vytvorenie_produktu.php" class="vytvorenie">Vytvoriť nový produkt</a>
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
                <th>Dátum vytvorenia</th>
                <th>Dátum úpravy</th>
                <th>Akcie</th>
             </tr>
             
            
             <?php foreach($vypis_vyzivy as $produkt):?>
                 <tr>
                     <?php $id = $produkt['idprodukty'];?>
                     <td><?php echo $id;?></td>
                     <td><?php echo $produkt['nazov'];?></td>
                     <td><?php echo $produkt['znacka'];?></td>
                     <td><img src="<?php echo BASE_URL . $produkt['img_hlavna']?>"></td>
                     <td><?php echo $produkt['img_alt'];?></td>
                     <td><?php echo substr($produkt['hlavny_popis'],0,180);?>...</td>
                     <td><?php echo $produkt['pocet_kusov'];?></td>
                     <td><?php echo $produkt['cena'];?></td>
                     <td><?php echo $produkt['datum_vytvorenia'];?></td>
                     <td><?php echo $produkt['datum_upravy'];?></td>
                     <td><a href = "" class = "edit">Editovať</a> <a href = "<?php echo BASE_URL; ?>admin/vymazanie/vymazanie_produktu.php?id=<?php echo $id;?>" class = "delete">Vymazať</a></td>
                 </tr>
             <?php endforeach;?>

        </table>
    </div>
</div>