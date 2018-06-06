<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
	}// On définit un login et un mot de passe de base pour tester notre exemple. Cependant, vous pouvez très bien interroger votre base de données afin de savoir si le visiteur qui se connecte est bien membre de votre site

session_start();
// on teste si nos variables sont définies
if (isset($_POST['idCommu']) && isset($_POST['password'])) {
	
		$request = $bdd->prepare('INSERT INTO communauté (Nom, Password, Login) VALUES (:nom, :password, :login)');
$request -> execute(array(':nom' => $_POST['idCommu'], ':password' => $_POST['password'], ':login' => $_SESSION['login']));
		
	$_SESSION['idCommu'] = $_POST['idCommu'];
}
else {
	echo 'Les variables du formulaire ne sont pas déclarées.';
}