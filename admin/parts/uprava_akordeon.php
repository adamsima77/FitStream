<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/kontrola_parts.php');?>
<div class="vyziva_obal">
    <div class="obal">
        <?php $akordeon->zobrazenieStavu(); ?>
        <a href="<?php echo BASE_URL; ?>admin/vytvorenie/vytvorenie_otazky_a_odpovede.php" class="vytvorenie">Vytvoriť novú otázku a odpoveď</a>

        <div class="table_con">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Odpoveď</th>
                    <th>Otázka</th>
                    <th>Dátum vytvorenia</th>
                    <th>Dátum úpravy</th>
                    <th>Akcia</th>
                </tr>
                <?php foreach($vypis_akordeon as $polozka_akordeonu): ?>
                    <tr>
                        <?php $id = $polozka_akordeonu['idakordeon']; ?> 
                        <td><?php echo $id; ?></td>
                        <td><?php echo substr($polozka_akordeonu['otazka'], 0, 180); ?>...</td>
                        <td><?php echo substr($polozka_akordeonu['odpoved'], 0, 180); ?>...</td>
                        <td><?php echo $polozka_akordeonu['datum_vytvorenia']; ?></td>
                        <td><?php echo $polozka_akordeonu['datum_upravy']; ?></td>
                        <td>
                            <a href="<?php echo BASE_URL; ?>admin/editovanie/editovanie_akordeonu.php?id=<?php echo $id; ?>" class="edit">Editovať</a>
                            <a href="<?php echo BASE_URL; ?>admin/vymazanie/vymazanie_akordeon.php?id=<?php echo $id; ?>" onclick="return kontrolaVymazania()" class="delete">Vymazať</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>