<?php foreach($ordini as $ordine): ?>
    <div class="ordine">
    <h3 class="text-center">Data: <?php echo $ordine["data"] ?></h3>
    <p class="mx-1">Venduto prodotto <?php echo "'".$ordine["nome"]."'"; ?> ,info:</p>
        <ul>
            <li class="mx-1 mt-2">Cliente: <?php echo $ordine["cliente"]; ?></li>
            <li class="mx-1">Quantità venduta: <?php echo $ordine["quantita"]; ?></li>
            <li class="mx-1">Stato consegna del prodotto:<?php echo $ordine["status"]; ?></li>
            <form action="update_order_status.php" method="post">
                <select id="status" name="status">
                    <option value="da_spedire">Da Spedire</option>
                    <option value="spedito">Spedito</option>
                    <option value="consegnato">Consegnato</option>                 
                </select>
                <input type="hidden" name="id" value="<?php echo $ordine["id"]?>"/>
                <button class="" name ="data" type="submit" value="<?php echo $ordine["data"]?>">Cambia status ordine</button>
            </form>           
        </ul>  
    </div>
<?php endforeach;?>