<div class = "acc">
    <h2>Najčastejšie otázky</h2>
<?php foreach($vypis_a as $a):?>
    <button class="akordeon"><?php echo htmlspecialchars($a['otazka']); ?></button>
    <div class="popis_akordeon">
      <p>
       <?php echo htmlspecialchars($a['odpoved'])?>
      </p>
      
    </div>
    <?php endforeach?>
</div>
