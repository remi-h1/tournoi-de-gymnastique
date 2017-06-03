<div>
<br><br><br>
	<form method="POST" action="">
	<table align="center" >
	<tr>
		<td>
			<label for="nom">Nom : </label>
		</td>
		<td>
				<input id="nom" type="text" name="nom" value="" size="30" maxlength="45">
		</td>

<td></td>

		<td>
			<label for="prenom">Prénom : </label>
		</td>
		<td>
				<input id="prenom" type="text" name="prenom" value="" size="30" maxlength="45">
		</td>

<td></td>

		<td>
			<input type="submit" name="Valider" value="Valider">
		</td>
	</tr>
	</table>
		
	</form>

</div>

<br><br><br>

<table align="center" border="1px;black">
	<tr>
		<td>
			<label for="nom">Nom </label>
		</td>
			<td>
			<label for="prenom">Prénom </label>
		</td>
	</tr>


	<?php
foreach( $lesJuges as $leJuge) 
{

		$nomJ = $leJuge['NOMJ'];
		$prenomJ = $leJuge['PRENOMJ'];
		$id=$leJuge['NUMEROJUGE'];
		?>	
		<tr>
			<td>
				<a href="index.php?uc=gererJuges&action=voirUnJuge&numeroJuge=<?php echo $id?>"><?php echo $nomJ ?></a>
			</td>

			<td>
				<?php echo $prenomJ ?>
			</td>

			<td>
				<a href="index.php?uc=gererJuges&action=modifierJuge&numeroJuge=<?php echo $id?>"><img src="images/modifier.gif"></a>
			</td>
			
			<td>
				<a href="index.php?uc=gererJuges&action=supprimerJuge&numeroJuge=<?php echo $id?>"><img src="images/supp.png"></a>
			</td>		
		</tr>
					
	
	<?php			
	}
?>
</table>