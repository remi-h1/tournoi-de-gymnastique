<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application ChampionnatGym
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 *
*/
class PdoChampionnatGym
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=fscfrmbdym2017';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoChampionnatGym = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct()
	{
    		PdoChampionnatGym::$monPdo = new PDO(PdoChampionnatGym::$serveur.';'.PdoChampionnatGym::$bdd, PdoChampionnatGym::$user, PdoChampionnatGym::$mdp); 
			PdoChampionnatGym::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoChampionnatGym::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancePdoChampionnatGym = PdoChampionnatGym::getPdoChampionnatGym();
 * @return l'unique objet de la classe PdoChampionnatGym
 */
	public  static function getPdoChampionnatGym()
	{
		if(PdoChampionnatGym::$monPdoChampionnatGym == null)
		{
			PdoChampionnatGym::$monPdoChampionnatGym= new PdoChampionnatGym();
		}
		return PdoChampionnatGym::$monPdoChampionnatGym;  
	}

// auteur Maxime
public function getLesJuges()
	{
		$req = "select * from juge";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$lesJuges = $res->fetchAll();
		return $lesJuges;
	}

	public function chercherLesJuges($nomJ, $prenomJ)
	{
		$req = "select NOMJ,PRENOMJ from juge where NOMJ like '%".$nomJ."%' and PRENOMJ like '%".$prenomJ."%' ";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$lesJuges = $res->fetchAll();
		return $lesJuges;
	}

	public function getLeJuge($idJuge)
	{
		$req = "select * from juge where NUMEROJUGE = ".$idJuge." ";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$leJuge = $res->fetch();
		return $leJuge;
	}

	public function ajouterLeJuge($nomJ, $prenomJ, $tel1, $tel2, $adresse, $cp, $ville, $mail, $region, $age, $conjoint, $sexe, $association)
	{
		
		$req = "insert into juge (NUMEROASSO, NOMJ,PRENOMJ,TELJ1, TELJ2, ADRESSEJ, CPJ, VILLEJ, MAILJ, REGIONJ, CONJOINT, SEXE, AGE) values ('$association', '$nomJ','$prenomJ','$tel1', '$tel2', '$adresse', '$cp', '$ville', '$mail', '$region', '$conjoint', '$sexe', '$age')" ;
		$res = PdoChampionnatGym::$monPdo->exec($req);

	}

	public function setLeJuge($nomJ, $prenomJ, $tel1, $tel2, $adresse, $cp, $ville, $mail, $region, $age, $conjoint, $sexe, $association, $idJuge)
	{
		$req = "update juge set NOMJ = '".$nomJ."' ,  PRENOMJ = '".$prenomJ."' , TELJ1 = '".$tel1."' , TELJ2 = '".$tel2."', ADRESSEJ = '".$adresse."' , CPJ = '".$cp."' , VILLEJ = '".$ville."', MAILJ = '".$mail."', REGIONJ = ".$region." ,  AGE = ".$age." ,  CONJOINT = ".$conjoint.",  SEXE = ".$sexe." ,  NUMEROASSO = ".$association." where NUMEROJUGE= ".$idJuge."";

		$res = PdoChampionnatGym::$monPdo->exec($req);
	}

	public function getLesHebergements()
	{
		$req = "select * from hebergement";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	public function getLesAssociations()
	{
		$req = "select * from association";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$lesAssociations = $res->fetchAll();
		return $lesAssociations;
	}


	public function supprimerJuge($idJuge)
	{
		$req = "delete from juge where NUMEROJUGE= '$idJuge' ";

		$res = PdoChampionnatGym::$monPdo->exec($req);
	}

	public function getLesJugesAffecter()
	{
		$req = "select * from juge where IDHEB is NULL";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$lesJuges = $res->fetchAll();
		return $lesJuges;
	}


	public function setAffecter($idJuge, $hebergement)
	{
		if($hebergement!='null')
			$idheb="'".$hebergement."'";
		else
			$idheb="NULL";
		$req = "update juge set IDHEB = $idheb where NUMEROJUGE= '$idJuge' ";
		$res = PdoChampionnatGym::$monPdo->exec($req);
	}
	// fin auteur Maxime

	public function supprimerJuge_Manger($idJuge)
	{
			$req = "delete from JUGE_MANGER where NUMEROJUGE= '$idJuge' ";

		$res = PdoChampionnatGym::$monPdo->exec($req);
	}

	// récupérer tous les hébergements avec une recherche et un trie
	// auteur : Rémi Hillériteau
	public function getLesHebergementsRecherche($r, $o, $t)
	{
		$req = "select * from hebergement WHERE NOMHEB LIKE '%".$r."%' ORDER BY $t $o";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}	

// enregistrer un hébergement
	// auteur : Rémi Hillériteau
	public function setHebergement($nom, $type, $nbChambre1, $nbChambre2, $tel, $adresse, $cp, $ville, $mail)
	{

		$req = "insert into hebergement(NOMHEB, NBCHAMBRE1PLACE, NBCHAMBRE2PLACES, TYPE, TELHEB, ADRESSE, VILLE, CP, MAIL) values ('$nom','$nbChambre1','$nbChambre2','$type','$tel','$adresse','$ville','$cp', '$mail')";
		$res = PdoChampionnatGym::$monPdo->exec($req);
	}

	public function getUnHebergement($id)
	{
		$req = "select * from hebergement WHERE IDHEB='$id'";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$uneLigne = $res->fetch();
		return $uneLigne;
	}
	
	// compte le nombre de réservation pour un hébergement et pour une chambre de 1 ou 2 places
	// auteur : Rémi Hillériteau
	public function getReservation($idHeb, $place)
	{
		if($place==1)
			$conjoint=0;
		else
			$conjoint=1;

		$req = "select COUNT(*) as 'nb' from juge WHERE IDHEB='$idHeb' AND CONJOINT='$conjoint'";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$uneLigne = $res->fetch();
		$valeur=$uneLigne['nb'];
		return $valeur;
	}

	// modifier un hébergement
	// auteur : Rémi Hillériteau
	public function modifHebergement($id, $nom, $type, $nbChambre1, $nbChambre2, $tel, $adresse, $cp, $ville, $mail)
	{
		$req = "UPDATE hebergement
				SET NOMHEB='$nom',
					NBCHAMBRE1PLACE='$nbChambre1',
				 	NBCHAMBRE2PLACES='$nbChambre2',
				   	TYPE='$type',
				    TELHEB='$tel',
				    ADRESSE='$adresse',
				    VILLE='$ville', 
				    CP='$cp',
				    MAIL='$mail'
				WHERE IDHEB='$id' ";
		$res = PdoChampionnatGym::$monPdo->exec($req);
	}

	// supprimer un hébergement
	// auteur : Rémi Hillériteau
	public function supHebergement($id)
	{
		$req = "DELETE FROM hebergement
				WHERE IDHEB='$id' ";
		$res = PdoChampionnatGym::$monPdo->exec($req);
	}


// récupérer UNE association
	// auteur : Rémi Hillériteau
	public function getUneAssociation($id)
	{
		$req = "select * from association WHERE NUMEROASSO='$id'";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$desLignes = $res->fetch();
		return $desLignes;
	}

	// récupérer le nom et l'id des associations
	// auteur : Rémi Hillériteau
	public function getNomsAssociations()
	{
		$req = "select NUMEROASSO, NOMA, VILLEA, CPA from association";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$desLignes = $res->fetchAll();
		return $desLignes;
	}

	// récupérer les associations
	// auteur : Rémi Hillériteau
	public function getPremierAssociation()
	{
		$req = "select * from association LIMIT 1";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$desLignes = $res->fetch();
		return $desLignes;
	}


	// modifier la partie compta dans association
	// auteur : Rémi Hillériteau
	public function modifierAssociationCompta($idAsso, $acompte, $acompteRecu, $factureAcompte, $modeReglement, $reglementSolde, $ouvertureCompte)
	{
		$req = "UPDATE association
				SET ACOMPTE='$acompte',
					ACOMPTERECU='$acompteRecu',
				 	FACTUREACOMPTE='$factureAcompte',
				   	MODEREGLEMENT='$modeReglement',
				    REGLEMENTSOLDE='$reglementSolde',
				    OUVERTURECOMPTE='$ouvertureCompte'
				WHERE NUMEROASSO='$idAsso' ";
		$res = PdoChampionnatGym::$monPdo->exec($req);
	}

	// réupérer les repas des GIMS
	// auteur : Rémi Hillérteau
	public function getLesJoursRepasGym($idAsso)
	{
		$req = "select * from JOUR_REPAS JR 
				INNER JOIN gim_manger GM ON JR.IDJR=GM.IDJR
				WHERE NUMEROASSO='$idAsso'";
				echo $req;
		$res = PdoChampionnatGym::$monPdo->query($req);
		$desLignes = $res->fetchAll();
		return $desLignes;
	}

	// auteur : Rémi Hillériteau
	public function getLesJoursRepasJuge($idJuge)
	{
		$req = "select * from JOUR_REPAS JR 
				INNER JOIN juge_manger JM ON JR.IDJR=JM.IDJR
				WHERE NUMEROJUGE='$idJuge'";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$desLignes = $res->fetchAll();
		return $desLignes;
	}

	// réupérer les juges d'une association
	// auteur : Rémi Hillérteau
	public function getJugesAsso($idAsso)
	{
		$req = "select * from juge WHERE NUMEROASSO='$idAsso'";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$desLignes = $res->fetchAll();
		return $desLignes;
	}

	// réupérer les repas pour les juges ou les gyms
	// auteur : Rémi Hillérteau
	public function getRepasJugesAsso($jugeGym)
	{
		if($jugeGym=='gym')
		{
			$jugeGymC='GIM';
		}
		else
		{
			$jugeGymC='JUGE';
		}

		$req = "select * from JOUR_REPAS
				WHERE $jugeGymC = 1";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$desLignes = $res->fetchAll();
		return $desLignes;

	}

	// récupérer les données des repas (le nombre de personnes)
	// auteur : Rémi Hillériteau
	public function getDonneesRepas($jugeGym, $idAsso, $idJ)
	{
		if($jugeGym=='gym')
		{
			$jugeGymC='GIM_manger';
			$nombre='NOMBRE_G';
			$contrainte=' NUMEROASSO='.$idAsso.'';
		}
		else
		{
			$jugeGymC='JUGE_manger';
			$nombre='NOMBRE_J';
			$contrainte=' NUMEROJUGE='.$jugeGym.'';
		}

		$req = "select $nombre as nb from JOUR_REPAS JR 
				INNER JOIN $jugeGymC M ON JR.IDJR=M.IDJR
				WHERE $contrainte
				AND M.IDJR=$idJ";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$nb = $res->fetch();
		if($nb==NULL)
			$nombre=0;
		else
			$nombre=$nb['nb'];
		return $nombre;

	}

	// auteur : Rémi Hillériteau
	public function getNomJuge($jugeGym)
	{
		$req = "select NOMJ, PRENOMJ from juge WHERE NUMEROJUGE=$jugeGym";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$requete = $res->fetch();
		$nom=$requete['PRENOMJ'] . " " . $requete['NOMJ'];
		return $nom;
	}

	// vérifie si une donnée existe dans gim_manger ou dans juge_manger
	// auteur : Rémi Hillériteau
	public function verifDonneesRepas($jugeGym, $idAsso, $idJ)
	{
		if($jugeGym=='gym')
		{
			$jugeGymC='GIM_manger';
			$nombre='NOMBRE_G';
			$contrainte=' NUMEROASSO='.$idAsso;
		}
		else
		{
			$jugeGymC='JUGE_manger';
			$nombre='NOMBRE_J';
			$contrainte=' NUMEROJUGE='.$jugeGym;
		}

		$req = "select count($nombre) as nb
				from $jugeGymC M 
				INNER JOIN JOUR_REPAS JR ON JR.IDJR=M.IDJR
				WHERE $contrainte
				AND M.IDJR=".$idJ;
		$res = PdoChampionnatGym::$monPdo->query($req);
		$r = $res->fetch();
		$reponse=$r['nb'];
		return $reponse;

	}

	// modifier les prestations
	// auteur : Rémi Hillériteau
	public function modifierPresation($jugeGym, $idjr, $nb, $idAsso)
	{
		if($jugeGym=='gym')
		{
			$jugeGymC='GIM_manger';
			$nombre='NOMBRE_G';
			$contrainte=' NUMEROASSO='.$idAsso.'';
		}
		else
		{
			$jugeGymC='JUGE_manger';
			$nombre='NOMBRE_J';
			$contrainte=' NUMEROJUGE='.$jugeGym.'';
		}

		$req = "UPDATE $jugeGymC
				SET $nombre=$nb
				WHERE IDJR=$idjr
				AND $contrainte ";
				echo $req;
		$res = PdoChampionnatGym::$monPdo->exec($req);
	}

	// créer les prestations
	// auteur : Rémi Hillériteau
	public function insererPresation($jugeGym, $idjr, $nb, $idAsso)
	{
		if($jugeGym=='gym')
		{
			$jugeGymC='GIM_manger';
			$nombre='NOMBRE_G';
			$idAssoOuIdJuge=$idAsso;
			$champAssoOuIdJuge='NUMEROASSO';
		}
		else
		{
			$jugeGymC='JUGE_manger';
			$nombre='NOMBRE_J';
			$idAssoOuIdJuge=$jugeGym;
			$champAssoOuIdJuge='NUMEROJUGE';

		}

		$req = "INSERT INTO $jugeGymC($champAssoOuIdJuge, IDJR, $nombre)
		VALUES($idAssoOuIdJuge, $idjr, $nb)";
				echo $req;
		$res = PdoChampionnatGym::$monPdo->exec($req);
	}

	// Récupérer le conjoint d'un juge
	// Rémi Hillériteau
	public function getConjointJuge($jugeGym)
	{
		$req = "select CONJOINT from juge WHERE NUMEROJUGE=$jugeGym";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$requete = $res->fetch();
		$CONJOINT=$requete['CONJOINT'];
		return $CONJOINT;
	}


	// récupérer le mot de passe
	// Rémi
	public function password()
	{
		$req = "select VALEUR from montant WHERE DONNEE='password'";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$requete = $res->fetch();
		$mdp=$requete['VALEUR'];
		return $mdp;
	}

	// Marin
	public function getLesClubs($NOM)
	{
	    $req="SELECT * from association where NOMA = '$NOM'";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$lesInfos = $res->fetchAll();
		return $lesInfos; 
	}
	
	// Marin
	public function getLesNomsClubs()
	{
	    $req="SELECT NOMA from association";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
	}

	// Marin
	public function getLesLibelleRepas()
	{
	    $req="SELECT * from jour_repas";
		$res = PdoChampionnatGym::$monPdo->query($req);
		$leslibelles = $res->fetchAll();
		return $leslibelles; 
	}
	
	// Marin
	public function getLesNBRepas($IDJR)
	{
	    $req="SELECT juge_manger.IDJR, LIBELLEJR, SUM(juge_manger.NOMBRE_J) AS jManger, SUM(gim_manger.NOMBRE_G) AS gManger
	    		FROM jour_repas, gim_manger, juge_manger 
	    		WHERE jour_repas.IDJR=gim_manger.IDJR 
	    		AND jour_repas.IDJR=juge_manger.IDJR 
	    		AND jour_repas.IDJR='$IDJR'
	    		GROUP BY LIBELLEJR";

		$res = PdoChampionnatGym::$monPdo->query($req);
		$LesNombres = $res->fetchAll();
		return $LesNombres; 
	}

	// Marin
	public function getUnRepa($IDJR)
	{
	    $req="SELECT *
	    		FROM jour_repas
	    		WHERE IDJR='$IDJR'";

		$res = PdoChampionnatGym::$monPdo->query($req);
		$reponse = $res->fetch();
		return $reponse; 
	}

	// Marin
	public function getGymRepas($IDJR)
	{
	    $req="SELECT SUM(NOMBRE_G) AS gManger
	    		FROM gim_manger
	    		WHERE IDJR='$IDJR'";

		$res = PdoChampionnatGym::$monPdo->query($req);
		$reponse = $res->fetch();
		if($reponse['gManger']!=null)
			$nombre=$reponse['gManger'];
		else
			$nombre=0;

		return $nombre;
	}

	// Marin
	public function getJugeRepas($IDJR)
	{
	    $req="SELECT SUM(NOMBRE_J) AS jManger
	    		FROM juge_manger
	    		WHERE IDJR='$IDJR'";

		$res = PdoChampionnatGym::$monPdo->query($req);
		$reponse = $res->fetch();
		if($reponse['jManger']!=null)
			$nombre=$reponse['jManger'];
		else
			$nombre=0;
		return $nombre; 
	}

}


?>