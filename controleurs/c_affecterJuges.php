<?php
//Maxime DUPONT
$action = $_REQUEST['action'];
switch($action)
{
	//actions correspondant a l affectation des juges
	case 'affecterLesJuges':
		{

			$lesJuges = $pdo->getLesJuges();
			$hebergements = $pdo->getLesHebergements();



			if(!empty($_REQUEST['juge']))
			{
				$idJuge = $_REQUEST['juge'];
				$jugeSelect = $pdo->getLeJuge($idJuge);
				$jugeIDHeb = $jugeSelect['IDHEB'];

				$i=0;
				foreach ($hebergements as $unHebergement) {

					if($jugeSelect['CONJOINT']==0)
					{
						$place = 1;
						$resa = $pdo->getReservation($unHebergement['IDHEB'], $place);
						$dispo = $unHebergement['NBCHAMBRE1PLACE'] - $resa;
					}			
						
					else
					{
						$place = 2;
						$resa = $pdo ->getReservation($unHebergement['IDHEB'], $place);
						$dispo = $unHebergement['NBCHAMBRE2PLACES'] - $resa;
					}

					if($dispo>=1)
					{
						$hebsDispos[$i]=$unHebergement;
						$i++;
					}
				}
				
				
				
			}
			include("vues/v_affecterJuges.php");
			break;
		}

	case 'validerAffecterLesJuges':
		{
			$idJuge = $_REQUEST['idJuge'];
			$hebergement = $_REQUEST['hebergement'];
			$pdo->setAffecter($idJuge, $hebergement);
			header("location: index.php?uc=affecterJuges&action=affecterLesJuges");
			break;
		}
}
?>