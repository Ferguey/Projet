<?php 

session_start();
?>
<!DOCTYPE html>
<html lang="en"><head>
	<title>Mot de passe oublié</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/loginStyle.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.css">
<!--===============================================================================================-->
</head>
<body>
	<form action="" method="post" class="divLogin">
			<span class="titreLogin">
				Mot de passe oublié
			</span>
					
			
			<span>
				Nous avons envoyé votre nouveau mot de passe à cette adresse mail : <?php echo $_SESSION['mail'] ?>
			</span>			
			<br></br>
			<a href="index.html" class="">
			<button class="boutonLogin">
				Retour
			</button>
			</a>
	</form>
</body>
</html>