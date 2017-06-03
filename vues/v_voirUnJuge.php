<?php

		$nomJ = $leJuge['NOMJ'];
		$prenomJ = $leJuge['PRENOMJ'];
		$tel1 = $leJuge['TELJ1'];
		$tel2 = $leJuge['TELJ2'];
		$adresse = $leJuge['ADRESSEJ'];
		$cp = $leJuge['CPJ'];
		$ville = $leJuge['VILLEJ'];
		$mail = $leJuge['MAILJ'];
		$age = $leJuge['AGE'];
		?>

<table align="center" border="1px;black" >	
		<tr>
			<td>
				<label> Nom</label>
			</td>

			<td>
				<label> Prénom</label>
			</td>

			<td>
				<label> Tel 1</label>
			</td>

			<td>
				<label> Tel 2</label>
			</td>

			<td>
				<label> Adresse</label>
			</td>

			<td>
				<label> CP</label>
			</td>

			<td>
				<label> Ville</label>
			</td>

			<td>
				<label> Mail</label>
			</td>

			<td>
				<label> Age</label>
			</td>

<!-- 			<td>
				<?php echo $cp ?>
			</td> -->
		</tr>
		<tr>
			<td>
				<?php echo $nomJ ?>
			</td>

			<td>
				<?php echo $prenomJ ?>
			</td>

			<td>
				<?php echo $tel1 ?>
			</td>

			<td>
				<?php echo $tel2 ?>
			</td>

			<td>
				<?php echo $adresse ?>
			</td>

			<td>
				<?php echo $cp ?>
			</td>

			<td>
				<?php echo $ville ?>
			</td>

			<td>
				<?php echo $mail ?>
			</td>

			<td>
				<?php echo $age ?>
			</td>

<!-- 			<td>
				<?php echo $cp ?>
			</td> -->
		</tr>
</table>					
	
