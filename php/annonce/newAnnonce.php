<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
	}
	
	if(isset($_POST['annonce']))
	{
		$request = $bdd->prepare('INSERT INTO annonce (Message, Date, Heure) VALUES (:message, :date, :heure)');
		$request -> execute(array(':login' => $_POST['annonce'], ':date' => date("d-m-Y"), ':heure' => date("H:i")));
		$request2 = $bdd -> query('SELECT * FROM annonce');
		$response2 = $request2 -> fetch();
		echo $response2['Message'];
		
	}

?>