<!-- Maxime DUPONT -->

<!-- formulaire de choix du juge -->
<form method="POST" action="index.php?uc=affecterJuges&action=affecterLesJuges">
	<label>Juge : </label>
		<select name="juge">
			<?php
			foreach ($lesJuges as $leJuge)
			{
			?>
				<option value="<?php echo $leJuge['NUMEROJUGE']?>" ><?php echo $leJuge['NOMJ'] ?> <?php echo $leJuge['PRENOMJ'] ?></option>
			<?php
			}
			?>
		</select>
<input type="submit" name="Valider" value="Valider">
</form>
<!--  -->



<?php 

if(!empty($_POST['juge']))
{
?>
<h2>Choisir l'hébergement</h2>
<!-- formulaire de choix de l'hébergement auquel on souhaite affecter le juge -->
<form method="POST" action="index.php?uc=affecterJuges&action=validerAffecterLesJuges" >
	<label>Hebergement : </label>
	<select name='hebergement' id='hebergement'>
	<option value="NULL" >Aucun hébergement</option>
		<?php
			foreach ($hebsDispos as $unHebergement)
			{
			?>
				<option value="<?php echo $unHebergement['IDHEB']?>" <?php if(isset($jugeIDHeb)) { echo selected2($unHebergement['IDHEB'], $jugeIDHeb) ; } ?> ><?php echo $unHebergement['NOMHEB']; ?></option>
			<?php
			}
			?>
	</select>
<input type="hidden" name="idJuge" value="<?php echo $idJuge; ?>">


		<input type="submit" name="Affecter" value="Affecter">
</form>
<!--  -->
<?php 
}
?>

