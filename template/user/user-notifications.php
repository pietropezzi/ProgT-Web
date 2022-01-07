<div class="notifica">
    <?php foreach($notifiche as $notifica): ?>
        <h2><?php echo $notifica["data"] ?></h2>
        <p><?php echo $notifica["tipo"] ?></p>
    <?php endforeach; ?>
</div>