<?php
session_start();
require_once("util/fonctions_PHP.php");
require_once("util/class.pdoChampionnatGym.php");
//$pdo = PdoChampionnatGym::getPdoChampionnatGym();
$pdo = PdoChampionnatGym::getPdoChampionnatGym();

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

// sécurité
	// vérification de la connexion
if(!isset($_SESSION['connexion']) OR $_SESSION['connexion']!=true)
{
	include('vues/v_entete.php');
	include("controleurs/c_connexion.php");
}
else // sinon on affiche le site
{
	include("controleurs/c_entete.php") ;
	include("vues/v_bandeau.php") ;
	
	switch($uc)
	{
		case 'accueil':
			{include("vues/v_accueil.php");break;}

		case 'gererJuges':
			{include("controleurs/c_gererJuges.php");break;}

		case 'affecterJuges':
			{include("controleurs/c_affecterJuges.php");break;}

		case 'gererHebergementJuges':
			{include("controleurs/c_gererHebergementJuges.php");break;}

		case 'gererPartieComptable':
			{include("controleurs/c_gererPartieComptable.php");break;}

		case 'choisirPrestations' :
			{include("controleurs/c_choisirPrestations.php");break;}

		case 'voirclubs':
			{include("controleurs/c_voirclubs.php");break;}
			
		case 'voirRepas':
			{include("controleurs/c_voirRepas.php");break;}

		case "deconnexion" :
			{
				session_destroy(); // Détruire toutes les variables "SESSION"
				header('Location: ?uc=accueil'); // Rediriger l'utilisateur vers la page d'accueil
				break;}

	}

	include("vues/v_pied.php") ;
}
require_once("util/fonctions_JS.php");
?>