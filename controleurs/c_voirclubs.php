<?php
// marin
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirclubs':
	{
  		$lesLignes = $pdo->getLesNomsClubs();
  		if (isset($_POST['club']))
			{
  		$nomasso = $_POST['club'];
		$Lesinfos= $pdo->getLesClubs($nomasso);
			}
  		include("vues/v_club.php");
		break;
	}
}
?>