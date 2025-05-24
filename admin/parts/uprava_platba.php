<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/kontrola_parts.php');?>
<div class="vyziva_obal">
    <div class="obal">
        <?php $platba->zobrazenieStavu(); ?>
        <a href="<?php echo BASE_URL; ?>admin/vytvorenie/vytvorenie_platba.php" class="vytvorenie">Vytvoriť novú otázku a odpoveď</a>

        <div class="table_con">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Typ platby</th>
                    <th>Dátum vytvorenia</th>
                    <th>Dátum úpravy</th>
                    <th>Akcia</th>
                </tr>
                <?php foreach($vypis as $polozka): ?>
                    <tr>
                        <?php $id = $polozka['idplatba']; ?> 
                        <td><?php echo $id; ?></td>
                        <td><?php echo $polozka['nazov']; ?></td>
                        <td><?php echo $polozka['datum_vytvorenia']; ?></td>
                        <td><?php echo $polozka['datum_upravy']; ?></td>
                        <td>
                            <a href="<?php echo BASE_URL; ?>admin/editovanie/editovanie_platba.php?id=<?php echo $id; ?>" class="edit">Editovať</a>
                            <a href="<?php echo BASE_URL; ?>admin/vymazanie/vymazanie_platba.php?id=<?php echo $id; ?>" onclick="return kontrolaVymazania()" class="delete">Vymazať</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>