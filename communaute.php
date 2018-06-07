<?php
echo $_COOKIE["idCommu"];
if(isset($_COOKIE["idCommu"]))
{
	header('Location: php/murannonce.php');
}
?>
<!DOCTYPE html>
<html lang="en"><head>
	<title>Communauté</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/loginStyle.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="divLogin">
			<span class="titreLogin">
				Sumela
			</span>
			
			<br></br>
		
			<a href="communauteCreate.html" class="">
			<button class="boutonLogin">
				Créer une communauté
			</button>
			</a>
			
			<br></br>
			
			<a href="communauteJoin.html" class="">
			<button class="boutonLogin">
				Rejoindre une communauté
			</button>
			</a>
	</div>
</body>
</html>