<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/kontrola_parts.php');?>
<div class="vyziva_obal">
    <div class="obal">
        <?php $kategoria_blog->zobrazenieStavu(); ?>
        <a href="<?php echo BASE_URL; ?>admin/vytvorenie/vytvorenie_kategoria_blog.php" class="vytvorenie">Vytvoriť novú kategóriu</a>

        <div class="table_con">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Názov kategórie</th>
                    <th>Dátum vytvorenia</th>
                    <th>Dátum Úpravy</th>
                    <th>Akcia</th>
                </tr>

                <?php foreach($kategoria_vypis as $polozka): ?>
                    
                    <tr>
                        <?php $id = $polozka['id_kategorie']; ?> 
                        <td><?php echo $id; ?></td>
                        <td><?php echo $polozka['nazov_kategorie_blog']; ?></td>
                        <td><?php echo $polozka['datum_vytvorenia']; ?></td>
                        <td><?php echo $polozka['datum_upravy']; ?></td>
                        <td>

                        <?php $pocet_clankov = $kategoria_blog->pocetProduktov($id);?>
                            <a href="<?php echo BASE_URL; ?>admin/editovanie/editovanie_kategorie_blog.php?id=<?php echo $id; ?>" class="edit">Editovať</a>
                            <a href="<?php echo BASE_URL; ?>admin/vymazanie/vymazanie_kategorie_blog.php?id=<?php echo $id; ?>" onclick="return kontrolaVymazaniaKategorie(<?php echo $pocet_clankov;?>)" class="delete">Vymazať</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>