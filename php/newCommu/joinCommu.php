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
	
	$request3 = $bdd->prepare('SELECT * FROM communauté WHERE Nom = :nom' );
	$request3 -> execute(array(':nom' => $_POST['idCommu']));

	$response3 = $request3 ->fetch();
	$request2 = $bdd->prepare('UPDATE users SET idCommu = :numCommu WHERE Login = :login ');
	$request2 -> execute(array(':numCommu' => $response3['idCommu'], ':login' => $_COOKIE['login']));
		
	$_SESSION['idCommu'] = $_POST['idCommu'];
	setcookie ("idCommu",$_POST["idCommu"],time()+ 36000, '/');
}
else {
	echo 'Les variables du formulaire ne sont pas déclarées.';
}
?>