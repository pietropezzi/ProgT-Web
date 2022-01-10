<?php foreach($notifiche as $notifica): ?>
<div class="notifica">
        <h2>Data: </h2><h3><?php echo $notifica["data"] ?></h3>
        <?php if($notifica["tipo"] == "password"): ?>
            <p>La tua password è stata aggiornata.</p>
        <?php endif; ?>
</div>
<?php endforeach; ?>