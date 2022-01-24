<script src="js/checkPassword.js"></script>
<script src="js/checkData.js"></script>
<?php  $card_result = $dbh->getCreditCard($_SESSION["email"]); ?>
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

    <?php if(!isset($card_result)){ ?>

        <?php if(isset($AddCardErr)): ?>
            <div class="errormessage">
                <h2><?php echo $AddCardErr; ?></h2>
            </div>
        <?php endif; ?>
   
        <form name="credit" action="add_credit_card.php" method="post" id="credit">
            <h2>Aggiugi carta di credito</h2>        
            <label for="numero">Numero della carta</label><input type="text" id="numero" name="numero" /><br>
            <label for="scadenza">Data di Scadenza</label><input type="text" id="scadenzaMese" name="scadenzaMese" />/<input type="text" id="scadenzaAnno" name="scadenzaAnno" /><br>
            <label for="cvv2">CVV2 </label><input type="text" id="cvv2" name="cvv2" /><br>  
            <input class="sub_button" type="submit" value="Aggiungi">     
        </form>
    <?php }
    else {?>
        <form name="credit" >
            <h2>La tua Carta di credito</h2>        
            <label for="numero">Numero della carta: <?php echo $card_result->numero?></label><br>
            <label for="scadenza">Data di Scadenza: <?php echo $card_result->scadenzaMese."/".$card_result->scadenzaAnno?></label><br>
        </form>
    <?php } ?>
</div>