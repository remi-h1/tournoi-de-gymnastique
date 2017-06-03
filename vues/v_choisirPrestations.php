<!--  
page pour gérer les préstations
auteur : Rémi Hillériteau
 -->
<h2>Choisir les prestations</h2>

<form method="post" action="" name="formulaireRecherche" class='formulaire'>
	<select name='asso' id='asso'>
		<?php
			foreach ($lesAssociations as $uneAssociation) {
				$selected=selected($uneAssociation['NUMEROASSO'], 'asso');
				echo "<option value='" . $uneAssociation['NUMEROASSO'] . "'" . $selected . ">" .  $uneAssociation['NOMA']. ", " . cp($uneAssociation['CPA']) . " "  . $uneAssociation['VILLEA'] . "</option>";
			}
		?>
	</select>
</form>

<form method="post" action="" name="formulairejugeGym" class='formulaire'>
	<select name='jugeGym' id='jugeGym'>
		<option value='gym' <?php echo selected('gym', 'jugeGym');?> >les Gyms</option>
		<?php
			foreach ($juges as $unJuge) {
				$selected=selected($unJuge['NUMEROJUGE'], 'jugeGym');
				echo "<option value='" . $unJuge['NUMEROJUGE'] . "'" . $selected . ">". $unJuge['PRENOMJ'] ." ". $unJuge['NOMJ'] ."</option>";
			}
		?>
	</select>
</form>

<form method="post" action="?uc=choisirPrestations&action=modifierPrestation" name="formulaire" class='formulaire'>
<?php
// queslques variables à transférer
echo "<input type='hidden' name='asso' value='" . $idAsso . "' />";
echo "<input type='hidden' name='jugeGym' value='" . $jugeGym . "' />";
?>
	<h3><?php echo $titreFormulaire; ?></h3>
	<table>
		<?php

		if($jugeGym=='gym') // pour les gymnastes
		{
			?>
				<span class='tableauEffectif'>effectif à manger</span>
			<?php
			foreach ($repasDonnees as $unRepaDonnees) {
				?>
				<tr>
					<td><?php echo $unRepaDonnees['libelle']; ?></td>
					<td><?php echo $unRepaDonnees['prix']; ?> €</td>
					<td>
						<input type="number" name="<?php echo $unRepaDonnees['id']; ?>" value="<?php echo $unRepaDonnees['nombre']; ?>" max='50' /> 
					</td>
				</tr>
				<?php
			}
		}
		else // pour les juges
		{
			foreach ($repasDonnees as $unRepaDonnees) {
				?>
				<tr>
					<td><?php echo $unRepaDonnees['libelle']; ?></td>
					<td><?php echo $unRepaDonnees['prix']; ?> €</td>
					<td>
						<input type="radio" name="<?php echo $unRepaDonnees['id']; ?>"  <?php echo checked($unRepaDonnees['nombre'], 0); ?> value="0" /> <label for="0">non</label>
						<input type="radio" name="<?php echo $unRepaDonnees['id']; ?>"  <?php echo checked($unRepaDonnees['nombre'], 1); ?> value="1" /> <label for="1">seul(e)</label>
						<?php if($conjoint==1) { ?>
						<input type="radio" name="<?php echo $unRepaDonnees['id']; ?>"  <?php echo checked($unRepaDonnees['nombre'], 2); ?> value="2"  /> <label for="2">avec conjoint(e)</label>
						<?php } ?>
					</td>
				</tr>
				<?php
			}
		}


		?>
		

	</table>

	<input type='submit' value='Modifier' />
	<input type='reset' value='Réinitialiser' />

	<?php
		echo "<input type='hidden' name='idAsso' value='" . $idAsso . "'/>";
	?>
</form>



<script>

var asso = document.getElementById('asso');
var jugeGym = document.getElementById('jugeGym');
var lien;

asso.addEventListener('change', function() {

lien="?uc=choisirPrestations&action=afficherPrestations&asso=" + asso.options[asso.selectedIndex].value;
document.location.href=lien;

});

jugeGym.addEventListener('change', function() {

lien="?uc=choisirPrestations&action=afficherPrestations&jugeGym=" + jugeGym.options[jugeGym.selectedIndex].value;
document.location.href=lien;

});

</script>