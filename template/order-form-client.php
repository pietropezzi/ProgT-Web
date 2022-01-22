<?php foreach($ordini as $ordine): ?>
    <div class="ordine">
    <h3 class="text-center">Data: <?php echo $ordine["data"] ?></h3>
    <img class="immagine_prodotto" src="<?php echo PROD_IMAGES_DIR.$ordine["immagine"]; ?>" alt="immagine_prodotto"/>
    <p class="mx-1">Prodotto: <?php echo "'".$ordine["nome"]."'"; ?> ,info:</p>
        <ul>
            <li class="mx-1 mt-2">Acquistato da: <?php echo $ordine["venditore"]; ?></li>
            <li class="mx-1">Quantità acquistata: <?php echo $ordine["quantita"]; ?></li>
            <?php $prezzo_tot = $ordine["prezzo"] * $ordine["quantita"]; ?>
            <li class="mx-1">Prezzo totale: <?php echo $prezzo_tot; ?></li>
            <li class="mx-1">Stato consegna del prodotto: <?php echo $ordine["status"]; ?></li>         
        </ul>  
    </div>
<?php endforeach;?>
<!--  o.venditore, o.nome, o.prezzo, o.quantita, o.status, p.immagine -->