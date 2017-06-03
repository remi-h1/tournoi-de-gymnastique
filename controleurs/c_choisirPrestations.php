<?php

// auteur : Rémi Hillériteau

$action = $_REQUEST['action'];
switch($action)
{
	case 'afficherPrestations':
	{
		// si une asso est déjà séléctionnée, on récupère les données de cette dernière
		if(isset($_REQUEST['asso']) AND !empty($_REQUEST['asso']))
			$uneAsso=$pdo->getUneAssociation($_REQUEST['asso']);
		else
			$uneAsso=$pdo->getPremierAssociation(); // sinon on prend les données de la première asso

		// innitialisation des variables
		$idAsso=$uneAsso['NUMEROASSO'];
		$juges=$pdo->getJugesAsso($idAsso);
		$lesAssociations= $pdo->getNomsAssociations();

		// savoir si il s'agit d'un juge ou des gyms
		if(isset($_REQUEST['jugeGym']))
			$jugeGym=$_REQUEST['jugeGym'];
		else
			$jugeGym='gym';

		if($jugeGym=='gym')
			$titreFormulaire='Les gymnastes';
		else{
			$titreFormulaire=$pdo->getNomJuge($jugeGym);
			$conjoint=$pdo->getConjointJuge($jugeGym);
		}

		// on récupère les repas
		$repas=$pdo->getRepasJugesAsso($jugeGym);

		$i=0;
		// les données des repas
		foreach ($repas as $repa) {
			$id=$repa['IDJR'];
			$libelle=$repa['LIBELLEJR'];
			$prix=$repa['prix'];
			// on récupère les données (nombre de personnes à manger) d'un repas pour chaque repa
			$nombreAManger=$pdo->getDonneesRepas($jugeGym, $idAsso, $repa['IDJR']);

			$repasDonnees[$i]=array(
				'id' => $id,
				'libelle' => $libelle,
				'prix' => $prix,
				'nombre' => $nombreAManger
				);
			$i++;
		}

		include("vues/v_choisirPrestations.php");
		break;
	}

	case 'modifierPrestation' :
	{
		$asso=$_REQUEST['asso'];
		$jugeGym=$_REQUEST['jugeGym'];
		$prestationJugeOuGym=$pdo->getRepasJugesAsso($jugeGym);
		foreach ($prestationJugeOuGym as $unePrestation) {
			
			// vérif si les préstations sont créé
			$reponse=$pdo->verifDonneesRepas($jugeGym, $asso, $unePrestation['IDJR']);
			$nombreReservation=$_REQUEST[$unePrestation['IDJR']];

			// si créé			
			if($reponse==1)
			{
				// modifier
				$pdo->modifierPresation($jugeGym, $unePrestation['IDJR'], $nombreReservation, $asso);
			}
			else // sinon ...
			{
				// insérer
				$pdo->insererPresation($jugeGym, $unePrestation['IDJR'], $nombreReservation, $asso);
			}
		
		}

		// retour à l'affichage
		header('location: ?uc=choisirPrestations&action=afficherPrestations&asso='.$asso.'&jugeGym='.$jugeGym);
		break;
	}

}

?>