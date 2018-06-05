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

if (isset($_POST['mail']) && isset($_POST['login'])) {
	$response = $bdd -> query($login_valide);
	$results = $response->fetch();

		if($_POST['mail'] == $results['mail'] && $_POST['login'] == $results['Login'])
	{
		include 'mail.php';
		sendmail($_POST['mail'], $_POST['login']);
		
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
