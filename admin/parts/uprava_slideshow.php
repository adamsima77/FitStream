<div class = "vyziva_obal">
    <div class = "obal">
        <?php $slideshow->zobrazenieStavu();?>
        <a href="<?php echo BASE_URL; ?>admin/vytvorenie/vytvorenie_slideshow.php" class="vytvorenie">Vytvoriť nový obrázok</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Fotka</th>
                <th>URL preklik</th>
                <th>Akcia</th>
            </tr>

            <?php foreach($vypis_slideshow  as $polozka_slideshow):?>
                <tr>
                    <?php $id = $polozka_slideshow['idslideshow'];?> 
                    <td><?php echo $id ?></td>
                    <td><img src="<?php echo BASE_URL . $polozka_slideshow['img_url']?>"></td>
                    <td><?php echo $polozka_slideshow['img_preklik'];?></td>
                    <td><a href="<?php echo BASE_URL; ?>admin/editovanie/editovanie_slideshow.php?id=<?php echo $id;?>" class = "edit">Editovať</a> <a href = "<?php echo BASE_URL; ?>admin/vymazanie/vymazanie_slideshow.php?id=<?php echo $id;?>" onclick = "return kontrolaVymazania()" class = "delete">Vymazať</a></td>
                </tr>
            <?php endforeach;?>

        </table>
    </div>
</div>