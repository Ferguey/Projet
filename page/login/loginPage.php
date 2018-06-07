<?php

if(isset($_COOKIE["login"]) && isset($_COOKIE["password"]))
{
	header('Location: php/login.php');
}

?>
<!DOCTYPE html>
<html lang="en"><head>
	<title>Login V10</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../css/loginStyle.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../fonts/font-awesome-4.7.0/css/font-awesome.css">
<!--===============================================================================================-->
</head>
<body>
	<form action="php/login.php" method="post" class="divLogin">
			<span class="titreLogin">
				Login
			</span>
					
			<div class="divChampsLogin">
				<input class="champsLogin" type="text" name="login" value="<?php if(isset($_COOKIE["login"])) { echo $_COOKIE["login"]; } ?>" placeholder="Username">
			</div>
								
			<div class="divChampsLogin">
				<input class="champsLogin" type="text" name="password" value="<?php  if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" placeholder="Password">
			</div>
						
			<div class="divChampsRememberMe">
				<input id="ckb1" type="checkbox" <?php if(isset($_COOKIE["login"])) { ?> checked <?php } ?> name="remember-me">
				<label class="labelRememberMe" for="ckb1">
					Remember me
				</label>
				<a href="passwordForget.html" class="forgotPassword">
					Forgot?
				</a>
			</div>
			<a href="post.html" class="">
			<button class="boutonLogin">
				Login
			</button>
			</a>
	</form>
</body>
</html>