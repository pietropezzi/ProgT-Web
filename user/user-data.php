<script src="js/checkPassword.js"></script>
<script src="js/checkData.js"></script>
<div class="userdata">
    <img class="user_image" src="<?php echo IMAGES_DIR."user-icon.png"; ?>" alt="icona utente"/>
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
    <form name="agg_pass" action="user/update-pass.php" method="post" id="pass"> 
        <h2>Aggiorna password</h2>
        <p>Per aggiornare la password, reinserire la vecchia password per la convalida per poi inserire la nuova due volte</p>
        <label for="oldpass">Vecchia password </label><input type="password" id="oldpass" name="oldpass"/><br>
        <label for="newpass">Nuova password </label><input type="password" id="newpass" name="newpass"/><br>
        <label for="newpass2">Nuova password </label><input type="password" id="newpass2" name="newpass2"/>
        <input class="sub_button" type="submit" value="Aggiorna"><br>
        <span id="err_pass"></span>
    </form>
    <?php if(isset($AggDataErr)): ?>
        <div class="errormessage">
            <h2><?php echo $AggDataErr; ?></h2>
        </div>
    <?php endif; ?>
    <form name="agg_dati" action="user/update-data.php" method="post" id="dati">
        <h2>Aggiorna dati</h2>
        <p>Per lasciare i vari dati invariati non compilare il campo.<br>
        Una volta inseriti correttamente i dati, dopo il loro aggiornamento, sarà necessario effettuare nuovamente il login.</p>
        <label for="nome">Nome </label><input type="text" id="nome" name="nome" /><br>
        <label for="username">Username </label><input type="text" id="username" name="username" /><br>
        <label for="email">Email </label><input type="text" id="email" name="email" /><br>
        <label for="telefono">Telefono </label><input type="text" id="telefono" name="telefono" /><br>
        <input class="sub_button" type="submit" value="Aggiorna"><br>
        <span id="err_dati"></span>
    </form>
</div>