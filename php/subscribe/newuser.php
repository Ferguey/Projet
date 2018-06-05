<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
	}// On définit un login et un mot de passe de base pour tester notre exemple. Cependant, vous pouvez très bien interroger votre base de données afin de savoir si le visiteur qui se connecte est bien membre de votre site


// on teste si nos variables sont définies
if (isset($_POST['login']) && isset($_POST['password'])) {
	
		$request = $bdd->prepare('INSERT INTO users (Login, Password, mail) VALUES (:login, :password, :mail)');
$request -> execute(array(':login' => $_POST['login'], ':password' => $_POST['password'], ':mail' => $_POST['mail']));
		
	
}
else {
	echo 'Les variables du formulaire ne sont pas déclarées.';
}