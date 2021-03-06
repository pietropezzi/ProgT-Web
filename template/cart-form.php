<div class="cart">  
    <?php  $card_result = $dbh->getCreditCard($_SESSION["email"]); ?>  
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
                <?php $id = $prod["nome"]; 
                      $id = str_replace(" ", "", $id); ?>
                <input type="hidden" name="venditore" value="<?php echo $prod["venditore"]?>"/>                                     
                <label class="mt-2" for="qt-<?php echo $id; ?>">Quantità:</label>
                <input class="quantity" type="number" step="1" min="1" max="<?php echo $max_quantity;?>" id="qt-<?php echo $id; ?>" name="quantita" value="<?php echo $prod["quantita"];?>" title="Qty">
               <button class="aggiorna text-white mx-4 my-2" name ="nome" value="<?php echo $prod["nome"]?>" type="submit">Aggiorna</button>
            </form>
            <?php if($prod["quantita"] > $prod["prod_quantita"]): ?>
                <?php $CantBuy = true; ?>
                <p>La quantità disponibile del prodotto non è sufficente per soddisfare l'acquisto,<br>
                quantità disponibile: <?php echo $prod["prod_quantita"]; ?></p>
            <?php endif; ?>
            <form action="remove_to_cart.php" method="post"> 
                <input type="hidden" name="venditore" value="<?php echo $prod["venditore"]?>"/>                    
                <button class="remove text-white mx-4 my-2" name ="nome" value="<?php echo $prod["nome"]?>" type="submit"><img class= "removeImg" src="<?php echo IMAGES_DIR; ?>remove.png" alt="bin"/></button>
            </form>
        </div>   
    </div>
    <?php endforeach;
    if(!empty($cart_product)){?>          
        <div class="resoconto  mb-1">
            <div class="metodo mb-2"> 
                <div class="scelta">               
                    <input type="radio" name="type" value="contanti" id="dot-1" checked>
				    <label class="name1" for="dot-1">Pagamento alla consegna</label><br>
                </div>
                <?php if(!empty($card_result)){?>
                    <div class="scelta">      
				        <input class="name2" type="radio" name="type" value="card" id="dot-2" >                
				        <label for="dot-2">Usa carta di credito: <?php echo $card_result->numero ?></label>
                    </div>
                <?php }  
                else { ?> 
               <div class="text-center">  
                    <form action="profile.php">
                        <button class="shopBtn text-white my-2" type="submit">Aggiugi la carta di credito</button>
                    </form>
                </div>
                <?php } ?>     
            </div>
            <table>           
                <?php $totale = 0 ?>
                <?php foreach($cart_product as $prod): ?>                  
                <tr class="spaceUnder">       
                    <td class="px-1"><?php echo $prod["nome"]; ?></td>
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
            <?php if(!isset($CantBuy)): ?>
            <div class="text-center">
                <form action="buy_order.php">
                    <button class="shopBtn text-white my-2" type="submit">Procedi all'ordine</button>
                </form>
            </div>
            <?php endif; ?>
        </div>
    <?php }?> 
</div>