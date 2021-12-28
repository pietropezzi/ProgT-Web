<!doctype html>
<html lang="it">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>PC-HARDWARE / Home</title>

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="styles/style.css" >
		
		<!-- Menu Animation -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.sidebar').click(function(){
					$('.sidebar').toggleClass('active');
					$('.sidebarBtn').toggleClass('toggle');
				})
			})		
		</script>
	</head>
	<body>
		<header class="text-white text-center">
			<img src="<?php echo IMAGES_DIR; ?>logo.png" alt="" />
			<h1 class="font-verdana text-center">PC HARDWARE</h1>
		</header>
		<div class="sidebar">
			<ul class="nav flex-column font-verdana" id="navigation">
			<?php foreach($Categories as $cat): ?>
				<li><a class="nav-link mt-2 mx-2 text-white" href="<?php echo $CatToLink[$cat]; ?>" ><?php echo $cat; ?></a></li>
			<?php endforeach; ?>
			</ul>
			<!-- INFORMAZIONI UTENTE LOGGATO -->
			<?php if(isset($_SESSION["email"])): ?>
			<div class="user">
				<?php require("user-info.php"); ?>
			</div>
			<?php endif; ?>
			<button class="sidebarBtn">
				<img class="img-fluid text-center" src="<?php echo IMAGES_DIR; ?>menu.png" alt="" />
			</button>
		</div>
		<main>
			<!-- La parte di error message sarà da portare nel form di registrazione -->
			<?php if(isset($Message)): ?>
				<div class="message">
					<h2><?php echo $Message; ?></h2>
				</div>
			<?php endif; ?>
			<?php if(isset($AuthForm)):?>
				<?php require($AuthForm); ?>			
			<?php endif; ?>		
		</main>
		<?php require("template/footer.php"); ?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	</body>
</html>
