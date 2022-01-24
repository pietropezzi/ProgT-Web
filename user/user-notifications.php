<?php foreach($notifiche as $notifica): ?>
<div class="notifica<?php echo "-".$notifica["status"]; ?>">
    <h2>Data: </h2><h3><?php echo $notifica["data"] ?></h3>
    <div class="line"></div>
    <?php if($notifica["tipo"] == "password"): ?>
        <p>La password di questo account è stata aggiornata.</p>
    <?php endif; ?>
    <?php if($notifica["tipo"] == "dati"): ?>
        <p>Alcuni dati di questo account sono stati aggiornati.</p>
    <?php endif; ?>
    <?php if($notifica["tipo"] == "create"): ?>
        <p>Creazione account.</p>
    <?php endif; ?>
    <?php if($notifica["tipo"] == "acquisto"): ?>
        <p>Hai eseguito un acquisto contenente: </p>
        <ul>
            <?php $prezzo_tot = 0; ?>
            <?php foreach($tutti_acquisti as $acquisto): ?>
                <?php if($acquisto["data"] == $notifica["data"]): ?>
                    <?php $prezzo_tot += $acquisto["prezzo"] * ( (int)$acquisto["quantita"]);?>
                    <li><?php echo $acquisto["nome"]." - QT(".$acquisto["quantita"].") da ".$acquisto["venditore"]; ?></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <p>Prezzo totale acquisto: <?php echo $prezzo_tot; ?>€</p> 
    <?php endif; ?>
    <?php if(($notifica["tipo"] == "spedito") || ($notifica["tipo"] == "consegnato")): ?>
        <p>Lo stato dell'Ordine contenente:</p>
        <ul>
        <?php foreach($tutti_acquisti as $acquisto): ?>
            <?php if( ($acquisto["data"] == $notifica["data_acquisto"]) && ($acquisto["id"] == $notifica["order_id"]) ): ?>
                <li><?php echo $acquisto["nome"]." - QT(".$acquisto["quantita"].") da ".$acquisto["venditore"]; ?></li>
            <?php endif; ?>
        <?php endforeach; ?>
        </ul>
        <p>E' stato aggiornato a:  <?php echo $notifica["tipo"]; ?></p>
    <?php endif; ?>
    <?php if($notifica["tipo"] == "agg_carta"): ?>
        <p>E' stata aggiunta una carta di credito al tuo account.</p>
    <?php endif; ?> 
    <?php if($notifica["tipo"] == "rem_carta"): ?>
        <p>La carta di credito collegata al tuo account è stata rimossa.</p>
    <?php endif; ?> 
    <?php if($notifica["tipo"] == "aggiunto"): ?>
        <p>Hai aggiunto un nuovo prodotto: <?php echo "'".$notifica["nome_prod"]."'"; ?></p>
        <p>Quantità: <?php echo $notifica["quantita"]; ?></p>
    <?php endif; ?> 
    <?php if($notifica["tipo"] == "venduto"): ?>
        <p>Venduto prodotto <?php echo "'".$notifica["nome_prod"]."'"; ?> ,info:</p>
        <ul>
            <li>Cliente: <?php echo $notifica["cliente"]; ?></li>
            <li>Quantità venduta: <?php echo $notifica["quantita"]; ?></li>
        </ul>
        <br>
    <?php endif; ?>
    <?php if($notifica["tipo"] == "esaurito"): ?>
        <p>ESAURITO il prodotto: <?php echo $notifica["nome_prod"]; ?></p>
    <?php endif; ?>
</div>
<?php endforeach; ?>