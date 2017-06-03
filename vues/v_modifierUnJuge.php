<!-- Maxime DUPONT -->
<!-- formulaire de modif d'un juge -->
<form method="POST" action="index.php?uc=gererJuges&action=validerModifierUnJuge" name="formulaireJuges" class='formulaireJuges'>
	<h3 align="center">Modifier un juge</h3>
	<table align="center" >
		<tr>
			<td>
				<label for="nom">Nom : </label>
			</td>
			<td>
				<input id="nom" type="text" name="nom" value="<?php echo $leJuge['NOMJ']?>" size="30" maxlength="45">
			</td>
		</tr>
		<tr>
			<td>
				<label for="prenom">Prénom : </label>
			</td>
			<td>
				<input id="prenom" type="text" name="prenom" value="<?php echo $leJuge['PRENOMJ']?>" size="30" maxlength="45">
			</td>
		</tr>
		<tr>
			<td>
				<label for="tel1">Tel1 : </label>
			</td>
			<td>
				<input id="tel1" type="text" name="tel1" value="<?php echo $leJuge['TELJ1']?>" size="10" maxlength="10">
			</td>
		</tr>
		<tr>
			<td>
				<label for="tel2">Tel2 : </label>
			</td>
			<td>
				<input id="tel2" type="text" name="tel2" value="<?php echo $leJuge['TELJ2']?>" size="10" maxlength="10">
			</td>
		</tr>
		<tr>
			<td>
				<label for="adresse">Adresse : </label>
			</td>
			<td>
				<input id="adresse" type="text" name="adresse" value="<?php echo $leJuge['ADRESSEJ']?>" size="30" maxlength="45">
			</td>
		</tr>
		<tr>
			<td>
				<label for="cp">CP : </label>
			</td>
			<td>
				<input id="cp" type="text" name="cp" value="<?php echo $leJuge['CPJ']?>" size="5" maxlength="5">
			</td>
		</tr>
		<tr>
			<td>
				<label for="ville">Ville : </label>
			</td>
			<td>
				<input id="ville" type="text" name="ville" value="<?php echo $leJuge['VILLEJ']?>" size="30" maxlength="45">
			</td>
		</tr>
		<tr>
			<td>
				<label for="mail">Mail : </label>
			</td>
			<td>
				<input id="mail" type="text" name="mail" value="<?php echo $leJuge['MAILJ']?>" size="30" maxlength="45">
			</td>
		</tr>
		<tr>
			<td>
				<label for="region">Région : </label>
			</td>
			<td>
				<input id="region" type="text" name="region" value="<?php echo $leJuge['REGIONJ']?>" size="30" maxlength="45">
			</td>
		</tr>
		<tr>
			<td>
				<label for="age">Age : </label>
			</td>
			<td>
				<input id="age" type="text" name="age" value="<?php echo $leJuge['AGE']?>" size="2" maxlength="2">
			</td>
		</tr>
		<tr>
			<td>
				<label for="conjoint">Conjoint : </label>
			</td>
			<td>
				<!-- boutons radio pour le conjoint -->
				OUI <input id="conjoint" type="radio" name="conjoint" value="1" size="30" maxlength="45" <?php echo checked($leJuge['CONJOINT'],1) ?> >

				NON <input id="conjointN" type="radio" name="conjoint" value="0" size="30" maxlength="45"<?php echo checked($leJuge['CONJOINT'], 0) ?> >
			</td>
		</tr>
		<tr>
			<td>
				<label for="sexe">Sexe : </label>
			</td>
			<td>
				<!-- boutons radio pour le sexe -->
				M <input id="sexe" type="radio" name="sexe" value="1" size="30" maxlength="45" <?php echo checked($leJuge['SEXE'], 1) ?>>

				F <input id="sexe" type="radio" name="sexe" value="0" size="30" maxlength="45" <?php echo checked($leJuge['SEXE'], 0) ?>>
			</td>
		</tr>
	
 		<tr>
 			<td>
 				<!-- menu déroulant pour le choix de l'association -->
 				<label for="association">Association : </label>
				<select name="association">
					<?php
					foreach ($associations as $association)
					{
					?>
						<option value="<?php echo $association['NUMEROASSO']?>" <?php echo selected2($leJuge['NUMEROASSO'], $association['NUMEROASSO']) ?>><?php echo $association['NOMA'] ?></option>
					<?php
					}
					?>
					
				</select>
 			</td>
 		</tr>
				
		<tr>
			<td>
				<input id="id" type="hidden" name="id" value="<?php echo $leJuge['NUMEROJUGE']?>" >
				<input type='button' value='Valider' onClick="return verifFormulaireJuges();" />
			</td>
		</tr>
				
	</table>
</form>