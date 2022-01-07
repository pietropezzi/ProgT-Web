<div class="cart">    
    <?php foreach($cart_product as $prod): ?>
    <div class="prodotti my-2">
        <img class="mx-4 mt-3" src="<?php echo IMAGES_DIR; ?>test.jpg" alt="logo"/>
        <div class="info">
            <p><?php echo $prod["nome"]; ?></p>
            <p class="text-primary">Prezzo: <?php echo $prod["prezzo"]; ?>€</p>   
            <label class="mt-2">Quantità:</label>
            <input class="quantity" type="number" step="1" min="1" max="" id="quantità" name="quantità" value="<?php echo $prod["quantita"];?>" title="Qty">
        </div>
        <button class="remove mx-4 my-2" name ="nome" value="<?php echo $prod["nome"];?>" type="submit">Rimuovi</button>
    </div>    
    <?php endforeach; ?>
    <div class="resoconto mt-5 mb-1">
        <table>           
            <?php $totale = 0 ?>
            <?php foreach($cart_product as $prod): ?>                  
            <tr class="spaceUnder">       
                <td><?php echo $prod["nome"]; ?></td>
                <td class="price"> <?php echo $prod["prezzo"] * $prod["quantita"]; $totale = $totale+$prod["prezzo"]*$prod["quantita"]?>€</td>    
            </tr>              
            <?php endforeach; ?>         
            <tr class="totale spaceUnder">       
                <td>Totale: </td>
                <td> <?php echo $totale?>€</td>    
            </tr>           
        </table>
        <div class="text-center">
            <button class="shopBtn text-white my-2" type="submit">Procedi all'ordine</button>
        </div>
    </div>     
</div>

