<!-- Marin -->
<h1>
	CLUBS
</h1>
<body>


    <h2>consultation des clubs</h2>
	<table>
<form method="post" action="index.php?uc=voirclubs&action=voirclubs">
   <p>


       <select name="club" id="club">
<?php
   foreach( $lesLignes as $laLigne) 
{
	$nomclub = $laLigne['NOMA'];
?>
       <option value="<?php echo $nomclub; ?>"><?php echo $nomclub; ?></option>
<?php
}
?>
       </select>

   </p>

	</table>
    <p /><input type="submit" value = "valider" /> 
     </form>

<?php
	if (isset($_POST['club']))
{
	?><h2><?php echo $_POST['club'];
?>



<?php
foreach( $Lesinfos as $Linfo) 
{
	$equipefa = $Linfo['NBEQUIPEFA'];
	$nbgymfa = $Linfo['NBGYMFA'];
	$equipefj =$Linfo['NBEQUIPEFJ'];
	$nbgymfj = $Linfo['NBGYMFJ'];
	$equipef1a =$Linfo['NBEQUIPEF1A'];
	$nbgymf1a = $Linfo['NBGYMF1A'];
	$equipef1j =$Linfo['NBEQUIPEF1J'];
	$nbgymf1j = $Linfo['NBGYMF1J'];
}

	?>	
</P>


<table border=3px>
	<tr>
		<th>
			Catégories
		</th>
		<th>
			Nombre d'équipes
		</th>
		<th>
			Nombre de Gym
		</th>
	</tr>


	<tr>
		<td>
			FA
		</td>
		<td>
			<?php echo $equipefa; ?>
		</td>
		<td>
			<?php echo $nbgymfa; ?>
		</td>
	</tr>



	<tr>
		<td>
			FJ
		</td>
		<td>
			<?php echo $equipefj; ?>
		</td>
		<td>
			<?php echo $nbgymfj; ?>
		</td>
	</tr>

	<tr>
		<td>
			F1A
		</td>
		<td>
			<?php echo $equipef1a; ?>
		</td>
		<td>
			<?php echo $nbgymf1a; ?>
		</td>
	</tr>

	<tr>
		<td>
		F1J
		</td>
		<td>
		<?php echo $equipef1j; ?>
		</td>
		<td>
		<?php echo $nbgymf1j; ?>
		</td>
	</tr>


</table>

<?php
}
?>
</body>