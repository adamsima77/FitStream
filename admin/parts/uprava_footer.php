<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/kontrola_parts.php');?>
<div class="vyziva_obal">
    <div class="obal">
        <?php $footer->zobrazenieStavu() ?>
        <a href="<?php echo BASE_URL; ?>admin/vytvorenie/vytvorenie_footer.php" class="vytvorenie">Vytvoriť novú ikonu</a>

        <div class="table_con">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Ikona</th>
                    <th>Farba pozadia</th>
                    <th>Farba ikony</th>
                    <th>URL</th>
                    <th>Akcia</th>
                </tr>
                <?php foreach($vypis_footer as $polozka_footer): ?>
                    <tr>
                        <?php $id = $polozka_footer['idfooter']; ?> 
                        <td><?php echo $id; ?></td>
                        <td><?php echo $polozka_footer['ikona']; ?></td>
                        <td><?php echo $polozka_footer['farba_bg']; ?></td>
                        <td><?php echo $polozka_footer['farba_ikony']; ?></td>
                        <td><?php echo $polozka_footer['url']; ?></td>
                        <td>
                            <a href="<?php echo BASE_URL; ?>admin/editovanie/editovanie_footeru.php?id=<?php echo $id; ?>" class="edit">Editovať</a>
                            <a href="<?php echo BASE_URL; ?>admin/vymazanie/vymazanie_footer.php?id=<?php echo $id; ?>" onclick="return kontrolaVymazania()" class="delete">Vymazať</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>