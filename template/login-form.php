<?php if(isset($ErrorMessage)): ?> 
<div class="errormessage">
    <h2 class="font-verdana text-center"><?php echo $ErrorMessage; ?></h2>
</div>
<?php endif; ?>
<div class="my-4 text-white register">
	<label class=" mb-2">Login</label>
	<form action="loginCheck.php" method="post">  
		<div>
			<div class="input-box">
				<label class="m-1">Email</label><br>
				<input class="text-input" type="text" placeholder="Inserisci la tua e-mail" name="email" required>
			</div>
			<div class="input-box">
				<label class="m-1">Password</label><br>
				<input class="text-input mb-2" type="password" placeholder="Inserisci la tua password" name="password" required>
			</div>
		</div>
		<input class="button my-3 text-white" type="submit" value="Login">
	</form> 
	<div class="link text-center ">
		<a href="auth.php">Non sei ancora registrato? Registrati qui.</a>
	</div>
</div>
