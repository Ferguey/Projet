<?php

	
	function sendmail($mail)
	{
		try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
	}
		$mailadress = $mail;
		
$passage_ligne = "\n";
include "generatepassword.php";
$newpassword = generatepassword();
$request = $bdd->prepare('UPDATE users set Password =  :password  WHERE mail = :email ');
$request -> execute(array(':password' => $newpassword, ':email' => $mailadress) );
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "Salut, voici ton nouveau mot de passe : " .$newpassword;
$message_html = "<html><head></head><body>Salut, voici ton nouveau mot de passe : " .$newpassword."</body></html>";
//==========
 
//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "test";
//=========
 
//=====Création du header de l'e-mail.
$header = "From: \"Romano\"<romano.petraroli@gmail.com>".$passage_ligne;
$header.= "Reply-to: ".$mailadress.$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========
 
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
	}
?>