<?php
//Maxime DUPONT
$action = $_REQUEST['action'];
switch($action)
{
	//action correspondant a la vue globale de tous les juges
	case 'voirJuges':
	{
		if (empty($_POST['nom']) and empty($_POST['prenom']))
  			$lesJuges = $pdo->getLesJuges();
		if (!empty($_POST['nom']) and !empty($_POST['prenom']))
  			$lesJuges = $pdo->chercherLesJuges($_POST['nom'],$_POST['prenom']);

		include("vues/v_voirJuges.php");
  		break;
	}

//actions correspondant a l ajout d'un juge
	case 'ajouterUnJuge':
	{
  		$hebergements = $pdo->getLesHebergements();
		$associations = $pdo->getLesAssociations();
		include("vues/v_ajouterUnJuge.php");
  		break;
	}
	case 'validerAjouterUnJuge':
	{
		$nomJ = $_REQUEST['nom'];
		$prenomJ = $_REQUEST['prenom'];
		$tel1 = $_REQUEST['tel1'];
		$tel2 = $_REQUEST['tel2'];
		$adresse = $_REQUEST['adresse'];
		$cp = $_REQUEST['cp'];
		$ville = $_REQUEST['ville'];
		$mail = $_REQUEST['mail'];
		$region = $_REQUEST['region'];
		$age = $_REQUEST['age'];
		$conjoint = $_REQUEST['conjoint'];
		$sexe = $_REQUEST['sexe'];
		$association = $_REQUEST['association'];


		$pdo->ajouterLeJuge($nomJ, $prenomJ, $tel1, $tel2, $adresse, $cp, $ville, $mail, $region, $age, $conjoint, $sexe, $association);

		header('location: ?uc=gererJuges&action=voirJuges');
  		break;
	}
/*      */

//action correspondant a la vue d'un seul juge
	case 'voirUnJuge':
	{
		$idJuge = $_REQUEST['numeroJuge'];

  		$leJuge = $pdo->getLeJuge($idJuge);

		include("vues/v_voirUnJuge.php");
  		break;
	}

//actions correspondant a la modification d'un juge
	case 'modifierJuge' :
	{
		$idJuge = $_REQUEST['numeroJuge'];

  		$leJuge = $pdo->getLeJuge($idJuge);

		$associations = $pdo->getLesAssociations();
		include("vues/v_modifierUnJuge.php");
		break;
	}

	case 'validerModifierUnJuge':
	{
		$nomJ = $_REQUEST['nom'];
		$prenomJ = $_REQUEST['prenom'];
		$tel1 = $_REQUEST['tel1'];
		$tel2 = $_REQUEST['tel2'];
		$adresse = $_REQUEST['adresse'];
		$cp = $_REQUEST['cp'];
		$ville = $_REQUEST['ville'];
		$mail = $_REQUEST['mail'];
		$region = $_REQUEST['region'];
		$age = $_REQUEST['age'];
		$conjoint = $_REQUEST['conjoint'];
		$sexe = $_REQUEST['sexe'];
		$association = $_REQUEST['association'];
		$idJuge = $_REQUEST['id'];

		$leJuge = $pdo->setLeJuge($nomJ, $prenomJ, $tel1, $tel2, $adresse, $cp, $ville, $mail, $region, $age, $conjoint, $sexe, $association, $idJuge);

		header('location: index.php?uc=gererJuges&action=voirJuges');
  		break;
	}
/*     */

//actions correspondant a la suppression d'un juge
	case 'supprimerJuge' :
	{
		$idJuge = $_REQUEST['numeroJuge'];

  		$leJuge = $pdo->getLeJuge($idJuge);

  		$hebergements = $pdo->getLesHebergements();
		$associations = $pdo->getLesAssociations();
		include("vues/v_supprimerUnJuge.php");
		break;
	}

	case 'validerSupprimerUnJuge':
	{
		$idJuge = $_REQUEST['id'];
		$pdo->supprimerJuge_Manger($idJuge);
		$pdo->supprimerJuge($idJuge);

		header('location: index.php?uc=gererJuges&action=voirJuges');
  		break;
	}
 /*     */
}
?>