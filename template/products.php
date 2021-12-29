<!-- le immagini verranno gestite in seguito -->
<?php foreach($prodotti as $prod): ?>
<div class="prodotto">
    <h3><?php echo $prod["nome"]; ?></h3>
    <h4><?php echo $prod["prezzo"]; ?>€</h4>
    <p><?php echo $prod["breve_descrizione"]; ?></p>
</div>
<?php endforeach; ?>