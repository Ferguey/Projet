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
if (isset($_POST['login']) && isset($_POST['pwd'])) {
	$response = $bdd -> query($login_valide);
	$results = $response->fetch();

		if($_POST['login'] == $results['Login'] && $_POST['pwd'] == $results['Password'])
	{
		session_start();
		header('');
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['pwd'] = $_POST['pwd'];
		
	}
	else
	{
					

		// puis on le redirige vers la page d'accueil
		echo '<meta http-equiv="refresh" content="0;URL=test.php">';
		echo 'coucou';
	}
	
}
else {
	echo 'Les variables du formulaire ne sont pas déclarées.';
}