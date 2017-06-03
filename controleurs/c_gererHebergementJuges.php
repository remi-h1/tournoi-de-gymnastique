<?php

// auteur : Rémi Hillériteau

$action = $_REQUEST['action'];
switch($action)
{
	case 'afficherListeHebergement':
	{
		// on récupère tous les hébergements et on les affiches
		$lesHebergements=lesHebergemntsTrie($pdo);
		include("vues/v_voirHebergement.php");
		break;
	}

	case 'modifierHebergement':
	{
		// si les données de modification de sont pas présent, retourner à l'affichage
		if(!isset($_GET['id']) OR empty($_GET['id']))
			{
				header('location: ?uc=gererHebergementJuges&action=afficherListeHebergement');
				break;
			}
		else // sinon INITIALISATION
		{
			$id=$_GET['id'];
		}

		$unHebergement=$pdo->getUnHebergement($id);
		$nom=$unHebergement['NOMHEB'];
		if($unHebergement['TYPE']=='p')
			$type='particulier';
		else
			$type='hotel';
		$nbChambre1=$unHebergement['NBCHAMBRE1PLACE'];
		$nbChambre2=$unHebergement['NBCHAMBRE2PLACES'];
		$tel=$unHebergement['TELHEB'];
		$adresse=$unHebergement['ADRESSE'];
		$cp=$unHebergement['CP'];
		$ville=$unHebergement['VILLE'];
		$mail=$unHebergement['MAIL'];

		// pour les vérifications des réservations, combien de chambre 1 et 2 place(s) dispos
		$nbChambre1PReserve=$pdo->getReservation($id, 1);
		$nbChambre2PReserve=$pdo->getReservation($id, 2);

		// initialisation des variables pour la modification (utilisation de la même page que pour la création)
		$action='validerModifHebergement';
		$titreForm='Modifier hébergement';

		// formulaire de modification
		include("vues/v_creerHebergement.php");
		break;
	}

	case 'validerModifHebergement' :
	{	
		// enregistrement des données de l'hébergement
		$id=$_REQUEST['id'];
		$nom=$_REQUEST['nom'];
		$type=$_REQUEST['type'];
		$nbChambre1=$_REQUEST['chambre1'];
		$nbChambre2=$_REQUEST['chambre2'];
		$tel=$_REQUEST['tel'];
		$adresse=$_REQUEST['adresse'];
		$cp=$_REQUEST['cp'];
		$ville=$_REQUEST['ville'];
		$mail=$_REQUEST['mail'];
		$pdo->modifHebergement($id, $nom, $type, $nbChambre1, $nbChambre2, $tel, $adresse, $cp, $ville, $mail);
		header('location: ?uc=gererHebergementJuges&action=confimerModif');
		break;
	}

	case 'confimerModif' :
	{
		// affiche d'un message de confimration de la modif
		$message="L'hebergement a bien été modifié";
		include('vues/v_message.php');
		$lesHebergements = lesHebergemntsTrie($pdo);
		include("vues/v_voirHebergement.php");
		break;
	}



	case 'supprimerHebergement':
	{
		// supprimer un hébergement
		$id=$_REQUEST['id'];
		$pdo->supHebergement($id);
		header('location: ?uc=gererHebergementJuges&action=confirmerSuppression');
		break;
	}

	case 'confirmerSuppression' :
	{
		// message de confirmation de la suppression
		$message="L'hebergement a bien été supprimé";
		include('vues/v_message.php');
		$lesHebergements =lesHebergemntsTrie($pdo);
		include("vues/v_voirHebergement.php");
		break;
	}

	case 'nouvelHebergement':
	{
		// initialisation des variables
		$nom=""; $type=""; $nbChambre1=0; $nbChambre2=0; $tel=""; $adresse=""; $cp=""; $ville=""; $mail='';
		$action='validerNouvelHebergement';
		$titreForm='Nouvel hébergement';

		// formulaire de création
		include("vues/v_creerHebergement.php");
		break;
	}

	case 'validerNouvelHebergement' :
	{
		// enregistrement des données
		$nom=$_REQUEST['nom'];
		$type=$_REQUEST['type'];
		$nbChambre1=$_REQUEST['chambre1'];
		$nbChambre2=$_REQUEST['chambre2'];
		$tel=$_REQUEST['tel'];
		$adresse=$_REQUEST['adresse'];
		$cp=$_REQUEST['cp'];
		$ville=$_REQUEST['ville'];
		$mail=$_REQUEST['mail'];
		$pdo->setHebergement($nom, $type, $nbChambre1, $nbChambre2, $tel, $adresse, $cp, $ville, $mail);
		header('location: ?uc=gererHebergementJuges&action=confimerEnregistrement');
		break;
	}

	case 'confimerEnregistrement':
	{
		// message de confrimation de la sauvegarde
		$message="L'hebergement a bien été enregistré";
		include('vues/v_message.php');
		$lesHebergements =lesHebergemntsTrie($pdo);
		include("vues/v_voirHebergement.php");
		break;
	}
}

?>