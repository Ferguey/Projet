<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
	}// On définit un login et un mot de passe de base pour tester notre exemple. Cependant, vous pouvez très bien interroger votre base de données afin de savoir si le visiteur qui se connecte est bien membre de votre site
$login_valide = 'SELECT * FROM users';
$pwd_valide = 'SELECT password FROM users';

// on teste si nos variables sont définies
if (isset($_POST['login']) && isset($_POST['password'])) {
	$response = $bdd -> query($login_valide);
	$results = $response->fetch();

		if($_POST['login'] == $results['Login'])
		{
			if($_POST['password'] == $results['Password'])
			{
	
				session_start();
				header('Location: ../communaute.html');
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['password'] = $_POST['password'];
		
			}
			else
			{
				header('Location: ../badPassword.html');
			}
		}
		else
		{
			header('Location: ../badLogin.html');

		}
	
}
else {
	echo 'Les variables du formulaire ne sont pas déclarées.';
}