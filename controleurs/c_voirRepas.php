
<?php
// Marin
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirRepas':
	{
  		$lesLibelles = $pdo->getLesLibelleRepas();
  		if (isset($_POST['repas']))
			{
  		$repas = $_POST['repas'];
		$LesNombres= getLesNBRepas($repas, $pdo);
		$idJour = $LesNombres['IDJR'];
		$libellejour = $LesNombres['LIBELLEJR'];
		$nbRepasJuges = $LesNombres['jManger'];
		$nbRepasGym = $LesNombres['gManger'];
			}
  		include("vues/v_repas.php");
		break;
	}
}
?>
