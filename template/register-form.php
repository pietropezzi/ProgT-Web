<script src="js/checkRegisterForm.js"></script>
<?php if(isset($ErrorMessage)): ?> 
<div class="errormessage">
    <h2 class="font-verdana text-center"><?php echo $ErrorMessage; ?></h2>
</div>
<?php endif; ?>
<div class="my-4 text-white register">
   <label class="mb-2">Registrati</label>
   <div>
        <span class="text-white" id="err_reg"></span>
		<form name="registrazione" action="registrazione.php" method="post" id="reg">
			<div class="user-details">
				<div class="input-box">
					<label class="mb-1" for="name">Nome</label><br>
                    <input class="text-input" id="name" name="name" type="text" placeholder="Inserisci il tuo nome" required>
                </div>
                <div class="input-box">
                    <label class="mb-1" for="username">Username</label><br>
                    <input class="text-input" id="username" name="username" type="text" placeholder="Inserisci il tuo username" required>
                </div>
                <div class="input-box">
                    <label class="mb-1" for="email">E-mail</label><br>
                    <input class="text-input" id="email" name="email" type="text" placeholder="Inserisci la tua e-mail" required>
                </div>
                <div class="input-box">
                    <label class="mb-1" for="phone">Numero di telefono</label><br>
                    <input class="text-input" id="phone" name="phone" type="text" placeholder="Inserisci il tuo numero di telefono">
                </div>
                <div class="input-box">
                    <label class="mb-1" for="psw">Password</label><br>
                    <input class="text-input" id="psw" name="password" type="password" placeholder="Inserisci la tua password" required>
                </div>
                <div class="input-box">
                    <label class="mb-1" for="psw2">Verifica Password</label><br>
                    <input class="text-input" id="psw2" name="password2" type="password" placeholder="Conferma la tua password" required>
                </div>
				<div class="user-type text-center">
                    <fieldset>
					<legend class="title my-2">Che tipo di utente sei?</legend><br>
					<div class="user-type">
						<input type="radio" name="type" value="cliente" id="dot-1" checked>
						<label class="name1" for="dot-1" >Cliente</label>
						<input class="name2" type="radio" name="type" value="venditore" id="dot-2" >
						<label for="dot-2">Venditore</label>
                    </div>
                    </fieldset>
				</div>
            </div>
            <div>
                <input class="button text-white" type="submit" value="Registrati">
            </div>
        </form>
    </div>
</div>
