<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/kontrola_parts.php');?>
<div class="vyziva_obal">
    <div class="obal">
        <?php $navbar->zobrazenieStavu(); ?>
        <a href="<?php echo BASE_URL; ?>admin/vytvorenie/vytvorenie_navbar.php" class="vytvorenie">Vytvoriť nový link</a>

        <div class="table_con">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Názov</th>
                    <th>URL</th>
                    <th>Akcia</th>
                </tr>

                <?php foreach($vypis_navbar as $polozka_navbar): ?>
                    <tr>
                        <?php $id = $polozka_navbar['idnavbar']; ?> 
                        <td><?php echo $id; ?></td>
                        <td><?php echo $polozka_navbar['nazov']; ?></td>
                        <td><?php echo $polozka_navbar['url']; ?></td>
                        <td>
                            <a href="<?php echo BASE_URL; ?>admin/editovanie/editovanie_navbaru.php?id=<?php echo $id; ?>" class="edit">Editovať</a>
                            <a href="<?php echo BASE_URL; ?>admin/vymazanie/vymazanie_navbar.php?id=<?php echo $id; ?>" onclick="return kontrolaVymazania()" class="delete">Vymazať</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>