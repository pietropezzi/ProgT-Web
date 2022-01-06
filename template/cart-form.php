<div class="cart">
    <div class="prodotti my-2">
        <?php foreach($cart_product as $prod): ?>
        <img class="mx-4 mt-3" src="<?php echo IMAGES_DIR; ?>test.jpg" alt="logo"/>
        <div class="info">
            <p><?php echo $prod["nome"]; ?></p>
            <p class="text-primary">Prezzo: <?php echo $prod["prezzo"]; ?>€</p>   
            <label class="mt-2">Quantità:</label>
            <input class="quantity" type="number" step="1" min="1" max="$quantita" id="quantità" name="quantità" value="1" title="Qty">
        </div>
        <button class="remove mx-4 my-2" name ="nome" value="<?php echo $prod["nome"];?>" type="submit">Rimuovi</button>
        <?php endforeach; ?>
    </div>
</div>