<div class="cart">    
    <?php 
    if(empty($cart_product)){?>          
        <p class="empty m-5 p-5">Il carrello è vuoto</p>
    <?php }     
    foreach($cart_product as $prod): ?>
    <div class="prodotti my-2">
        <?php $result_get = $dbh->getMaxQuantity($prod["nome"], $prod["venditore"]);
            $max_quantity = implode($result_get[0]);?>
        <img class="prodImg mx-4 mt-3 mb-3" src="<?php echo PROD_IMAGES_DIR.$prod["immagine"]; ?>" alt="logo"/>
        <div class="info">
            <p><?php echo $prod["nome"]; ?></p>
            <p class="text-primary">Prezzo: <?php echo $prod["prezzo"]; ?>€</p>
            <form action="update_cart_quantity.php" method="post"> 
                <input type="hidden" name="venditore" value="<?php echo $prod["venditore"]?>"/>                                     
                <label class="mt-2">Quantità:</label>
                <input class="quantity" type="number" step="1" min="1" max="<?php echo $max_quantity;?>" id="quantità" name="quantita" value="<?php echo $prod["quantita"];?>" title="Qty">
                <button class="aggiorna text-white mx-4 my-2" name ="nome" value="<?php echo $prod["nome"]?>" type="submit">Aggiorna</button>
            </form>
        </div>
        <form action="remove_to_cart.php" method="post"> 
            <input type="hidden" name="venditore" value="<?php echo $prod["venditore"]?>"/>                    
            <button class="remove text-white mx-4 my-2" name ="nome" value="<?php echo $prod["nome"]?>" type="submit"><img class= "removeImg" src="<?php echo IMAGES_DIR; ?>remove.png" alt="bin"/></button>
        </form>       
    </div>    
    <?php endforeach;
    if(!empty($cart_product)){?>          
        <div class="resoconto mt-5 mb-1">
            <table>           
                <?php $totale = 0 ?>
                <?php foreach($cart_product as $prod): ?>                  
                <tr class="spaceUnder">       
                    <td><?php echo $prod["nome"]; ?></td>
                    <?php if($prod["quantita"] > 1){ ?>
                        <td class="quantity">x<?php echo $prod["quantita"]; ?></td> 
                    <?php }
                    else{ ?>   
                        <td></td>   
                    <?php } ?>                       
                    <td class="price"> <?php echo $prod["prezzo"] * $prod["quantita"]; $totale = $totale+$prod["prezzo"]*$prod["quantita"]?>€</td>    
                </tr>                        
                <?php endforeach; ?>         
                <tr class="totale spaceUnder">       
                    <td>Totale: </td>
                    <td></td>
                    <td class="price"> <?php echo $totale?>€</td>    
                </tr>           
            </table>
            <div class="text-center">
                <form action="buy_order.php">
                    <button class="shopBtn text-white my-2" type="submit">Procedi all'ordine</button>
                </form>
            </div>
        </div>
    <?php }?> 
</div>

