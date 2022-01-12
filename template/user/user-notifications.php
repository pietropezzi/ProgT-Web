<?php foreach($notifiche as $notifica): ?>
<div class="notifica">
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
</div>
<?php endforeach; ?>