<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
	}

$login_valide = 'SELECT * FROM users';

if (isset($_POST['mail'])) {
	$response = $bdd -> query($login_valide);
	$results = $response->fetch();

		if($_POST['mail'] == $results['mail'])
	{
		include 'mail.php';
		sendmail($_POST['mail']);
		header('Location: ../../emailSend.php');
		session_start();
		$_SESSION['mail'] = $_POST['mail'];
	}
	else
	{
					

		echo $results['mail'];
		//echo '<meta http-equiv="refresh" content="0;URL=test.php">';
		
	}
	
}
else {
	echo 'Les variables du formulaire ne sont pas déclarées.';
}

?>
