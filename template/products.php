<!-- le immagini verranno gestite in seguito -->
<?php foreach($prodotti as $prod): ?>
<div class="prodotto">
    <h2><?php echo $prod["nome"]; ?></h2>
    <h3><?php echo $prod["prezzo"]; ?>€</h3>
    <p><?php echo $prod["breve_descrizione"]; ?></p>
    <form action="details.php" method="post">
        <input type="hidden" name="venditore" value="<?php echo $prod["venditore"]?>"/>
        <button name ="nome" value="<?php echo $prod["nome"];?>" type="submit">Dettaglio</button>
    </form>
</div>
<?php endforeach; ?>