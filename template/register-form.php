<div class="my-4 text-white register">
    <label class=" mb-2" for="username">Registrati</label>
    <div class="">
        <form name="registrazione" action="registrazione.php" onsubmit="return validateForm()" method="post"action="#">
            <div class="user-details">
                <div class="input-box">
                    <label class="mb-1" for="username">Nome</label><br>
                    <input name="name" type="text" placeholder="Enter your name" required>
                </div>
                <div class="input-box">
                    <label class="mb-1" for="username">Username</label><br>
                    <input name="username" type="text" placeholder="Enter your username" required>
                </div>
                <div class="input-box">
                    <label class="mb-1" for="username">E-mail</label><br>
                    <input name="email" type="text" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                    <label class="mb-1" for="username">Numero di telefono</label><br>
                    <input name="phone" type="text" placeholder="Enter your number" required>
                </div>
                <div class="input-box">
                    <label class="mb-1" for="username">Password</label><br>
                    <input name="password" type="password" placeholder="Enter your password" required>
                </div>
                <div class="input-box">
                    <label class="mb-1" for="username">Verifica Password</label><br>
                    <input name="password2" type="password" placeholder="Confirm your password" required>
                </div>
            </div>
            <div>
                <input class="button text-white" type="submit" value="Registrati">
            </div>
        </form>
    </div>
</div>
