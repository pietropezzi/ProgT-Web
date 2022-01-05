<script src="js/checkPassword.js"></script>
<script src="js/checkData.js"></script>
<div class="userdata">
    <img class="user_image" src="<?php echo USER_IMAGES_DIR.$profile_image; ?>" alt="immagine profilo"/>
    <h2>Nome:</h2><p><?php echo $profile_data->name; ?></p><br>
    <h2>Username:</h2><p><?php echo $profile_data->username ?></p><br>
    <h2>Email:</h2><p><?php echo $profile_data->email ?> </p><br>
    <h2>Tipo:</h2><p><?php echo $profile_data->type ?></p><br>
    <h2>Telefono:</h2><p><?php echo $profile_data->phone ?></p>
</div>
<div class="update_userdata_form">
    <?php if(isset($AggPassErr)): ?>
        <div class="errormessage">
            <h2><?php echo $AggPassErr; ?></h2>
        </div>
    <?php endif; ?>
    <form name="agg_pass" action="template/user/update-pass.php" onsubmit="return checkAggPassForm()" method="post"> 
        <h2>Aggiorna password</h2>
        <p>Per aggiornare la password, reinserire la vecchia password per la convalida per poi inserire la nuova due volte</p>
        <label for="oldpass">Vecchia password </label><input type="text" id="oldpass" name="agg_pass"/><br>
        <label for="newpass">Nuova password </label><input type="text" id="newpass" name="agg_pass"/><br>
        <label for="newpass2">Nuova password </label><input type="text" id="newpass2" name="agg_pass"/>
        <input class="sub_button" type="submit" value="Aggiorna">
    </form>
    <form name="agg_dati" action="template/user/update-data.php" onsubmit="return checkData()" method="post">
        <h2>Aggiorna dati</h2>
        <p>Per lasciare i vari dati invariati non compilare il campo.</p>
        <label for="nome">Nome </label><input type="text" id="nome" name="agg_dati" /><br>
        <label for="username">Username </label><input type="text" id="username" name="agg_dati" /><br>
        <label for="email">Email </label><input type="text" id="email" name="agg_dati" /><br>
        <label for="telefono">Telefono </label><input type="text" id="telefono" name="agg_dati" /><br>
        <fieldset>
            <legend>Tipo</legend>
            <input type="radio" name="agg_dati" value="cliente" id="cliente" <?php if($_SESSION["type"] == "cliente"): ?> checked="checked" <?php endif; ?>>
            <label for="cliente">Cliente</label>
            <input type="radio" name="agg_dati" value="venditore" id="venditore" <?php if($_SESSION["type"] == "venditore"): ?> checked="checked" <?php endif; ?>>
            <label for="venditore">Venditore</label>
        </fieldset>
        <input class="sub_button" type="submit" value="Aggiorna">
    </form>
</div>