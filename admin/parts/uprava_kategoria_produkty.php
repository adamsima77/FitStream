<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/kontrola_parts.php');?>
<div class="vyziva_obal">
    <div class="obal">
        <?php $kategoriaprodukty->zobrazenieStavu(); ?>
        <a href="<?php echo BASE_URL; ?>admin/vytvorenie/vytvorenie_kategoria_produkty.php" class="vytvorenie">Vytvoriť novú kategóriu</a>

        <div class="table_con">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Názov kategórie</th>
                    <th>Názov podkategórie</th>
                    <th>Dátum vytvorenia</th>
                    <th>Dátum Úpravy</th>
                    <th>Akcia</th>
                </tr>

                <?php foreach($kategoria_vypis as $polozka): ?>
                    <?php $id = $polozka['idkategorie']; ?> 
                    <?php $overenie_id = ($id == NULL) ? -1 : $id;?>
                    <?php $vypis_nadkategorie = $kategoriaprodukty->vypisNadKategorie($overenie_id);?>
                    <?php $id_podkategorie = $polozka['kategorie_idkategorie'];?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $polozka['nazov_kategorie']; ?></td>
                        <td><?php echo (is_string($vypis_nadkategorie)) ? $vypis_nadkategorie : $vypis_nadkategorie['nazov_kategorie'];?></td>
                        <td><?php echo $polozka['datum_vytvorenia']; ?></td>
                        <td><?php echo $polozka['datum_upravy']; ?></td>
                        <td>

                        <?php $pocet_clankov = $kategoriaprodukty->pocetProduktov($id);?>
                            <a href="<?php echo BASE_URL; ?>admin/editovanie/editovanie_kategorie_produkt.php?id=<?php echo $id; ?>" class="edit">Editovať</a>
                            <a href="<?php echo BASE_URL; ?>admin/vymazanie/vymazanie_kategorie_produkt.php?id=<?php echo $id; ?>" onclick="return kontrolaVymazaniaProduktu(<?php echo $pocet_clankov;?>)" class="delete">Vymazať</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>