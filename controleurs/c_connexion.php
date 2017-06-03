<?php

// auteur : Rémi Hillériteau

if(isset($_REQUEST['action']))
	$action = $_REQUEST['action'];
else
	$action = "";
switch($action)
{

case 'connexion':
	{
		// on récupère le mot de passe
		$password= $pdo->password();

		// vérif du mot de passe envoyé
		if(isset($_REQUEST['password']) AND $password==$_REQUEST['password'])
		{
			$_SESSION['connexion']=true;
			header('location: ?ud=accueil');
		}
		else
			header('location: ?mdp=false');
		
		break;
	}

default :
	{
		// si une erreur à afficher
		if(isset($_REQUEST['mdp']) AND $_REQUEST['mdp']==true)
			$erreur=true;
		// afficher formulaire de connexion
		include("vues/v_connexion.php");
		break;
	}


}