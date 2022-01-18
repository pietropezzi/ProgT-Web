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
            <?php $prezzo_tot = 0;
                $venditore = ""; ?>
            <?php foreach($tutti_acquisti as $acquisto): ?>
                <?php if($acquisto["data"] == $notifica["data"]): ?>
                    <?php $prezzo_tot += $acquisto["prezzo"];?>
                    <li><?php echo $acquisto["nome"]." - QT(".$acquisto["quantita"].") da ".$acquisto["venditore"]; ?></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        Prezzo totale acquisto: <?php echo $prezzo_tot; ?>€</p> 
    <?php endif; ?>

    <!-- TODO: cambio status su consegna di 1 prodotto -->
    <?php if($notifica["tipo"] == "aggiunto"): ?>
        <p>Hai aggiunto un nuovo prodotto: <?php echo $notifica["nome_prod"]; ?></p>
    <?php endif; ?> 
</div>
<?php endforeach; ?>