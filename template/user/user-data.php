<div class="userdata">
    <img class="user_image" src="<?php echo USER_IMAGES_DIR.$profile_image; ?>" alt="immagine profilo"/>
    <h2>Nome:</h2><p><?php echo $profile_data->name; ?></p><br>
    <h2>Email:</h2><p><?php echo $profile_data->email ?> </p><br>
    <h2>Username:</h2><p><?php echo $profile_data->username ?></p><br>
    <h2>Tipo:</h2><p><?php echo $profile_data->type ?></p><br>
    <h2>Telefono:</h2><p><?php echo $profile_data->phone ?></p>
</div>
<div class="update_userdata_form">
    <form>
        <h2>Aggiorna password</h2>
        <p>Per aggiornare la password, reinserire la vecchia password per la convalida per poi inserire la nuova due volte</p>
        <label for="oldpass">Vecchia password:</label><input type="text" id="oldpass" name="agg_pass"/><br>
        <label for="newpass">Nuova password:</label><input type="text" id="newpass" name="agg_pass"/><br>
        <label for="newpass2">Nuova password:</label><input type="text" id="newpass2" name="agg_pass"/>
        <input class="sub_button" type="submit" value="Aggiorna">
    </form>
    <form>
        <h2>Aggiorna dati</h2>
        <p>Per lasciare i vari dati invariati non compilare il campo.</p>
    </form>
</div>