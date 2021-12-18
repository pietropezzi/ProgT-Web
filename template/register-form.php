<div class="bg-ligt  text-center  m-3 p-3 ">
    <label for="username">Registrati</label>
    <div class="">
        <form name="registrazione" action="registrazione.php" onsubmit="return validateForm()" method="post"action="#">
            <div class="user-details">
                <div class="input-box">
                    <label for="username">Nome</label>
                    <input name = "name" type="text" placeholder="Enter your name" required>
                </div>
                <div class="input-box">
                    <label for="username">Username</label>
                    <input name = "username" type="text" placeholder="Enter your username" required>
                </div>
                <div class="input-box">
                    <label for="username">Email</label>
                    <input name = "email" type="text" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                    <label for="username">Numero di telefono</label>
                    <input name = "phone" type="text" placeholder="Enter your number" required>
                </div>
                <div class="input-box">
                    <label for="username">Password</label>
                    <input name = "password" type="password" placeholder="Enter your password" required>
                </div>
                <div class="input-box">
                    <label for="username">Conferma Password</label>
                    <input name = "password2" type="password" placeholder="Confirm your password" required>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Registrati">
            </div>
        </form>
    </div>
</div>