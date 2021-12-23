<script src="js/checkRegisterForm.js"></script>
 <div class="my-4 text-white register">
    <label class=" mb-2">Registrati</label>
    <div>
        <form name="registrazione" action="registrazione.php" onsubmit="return checkRegisterForm()" method="post">
            <div class="user-details">
                <div class="input-box">
                    <label class="mb-1" for="username">Nome</label><br>
                    <input id="name" name="name" type="text" placeholder="Inserisci il tuo nome" required>
                </div>
                <div class="input-box">
                    <label class="mb-1" for="username">Username</label><br>
                    <input id="username" name="username" type="text" placeholder="Inserisci il tuo username" required>
                </div>
                <div class="input-box">
                    <label class="mb-1" for="username">E-mail</label><br>
                    <input id="email" name="email" type="text" placeholder="Inserisci la tua e-mail" required>
                </div>
                <div class="input-box">
                    <label class="mb-1" for="username">Numero di telefono</label><br>
                    <input id="phone" name="phone" type="text" placeholder="Inserisci il tuo numero di telefono" required>
                </div>
                <div class="input-box">
                    <label class="mb-1" for="username">Password</label><br>
                    <input id="psw" name="password" type="password" placeholder="Inserisci la tua password" required>
                </div>
                <div class="input-box">
                    <label class="mb-1" for="username">Verifica Password</label><br>
                    <input id="psw2" name="password2" type="password" placeholder="Conferma la tua password" required>
                </div>
            </div>
            <div>
                <input class="button text-white" type="submit" value="Registrati">
            </div>
        </form>
    </div>
</div>