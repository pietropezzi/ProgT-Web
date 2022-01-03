<!-- le immagini verranno gestite in seguito -->
<?php foreach($prodotti as $prod): ?>
<div class="prodotto">
    <h2><?php echo $prod["nome"]; ?></h2>
    <h3><?php echo $prod["prezzo"]; ?>€</h3>
    <p><?php echo $prod["breve_descrizione"]; ?></p>
</div>
<?php endforeach; ?>