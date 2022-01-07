<!doctype html>
<html lang="it">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php echo $title; ?></title>

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="styles/style.css" >
		<link rel="stylesheet" href="styles/user-style.css" >
		
		<!-- Menu Animation -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$('.sidebar').click(function(){
					$('.sidebar').toggleClass('active');
					$('.sidebarBtn').toggleClass('toggle');
				})
			})		
		</script>
	</head>
	<body>
        <header>
            <div class="user_header">
                <?php require("user-header.php"); ?> 
            </div>
        </header>
		<nav>
			<?php require("template/sidebar.php"); ?>
		</nav>
		<main>
			<?php if(isset($Message)): ?>
            <div class="message">
                <h2><?php echo $Message; ?></h2>
            </div>
            <?php endif; ?>
			<?php if(isset($ErrorMessage)): ?>
            <div class="errormessage">
                <h2><?php echo $ErrorMessage; ?></h2>
            </div>
            <?php endif; ?>
			<?php if(isset($notifiche)): ?>
				<?php require("template/user/user-notifications.php"); ?>
			<?php endif; ?>
			<?php if(isset($profile_data)): ?>
				<?php require("template/user/user-data.php"); ?>
			<?php endif; ?>
		</main>
		<footer>
			<?php require("template/footer.php"); ?>
		</footer>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	</body>
</html>
