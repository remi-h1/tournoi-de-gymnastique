<!-- Marin -->
<h1>
	REPAS
</h1>
<body>


    <h2>consultation des repas</h2>
	<table>
<form method="post" action="index.php?uc=voirRepas&action=voirRepas">
   <p>


       <select name="repas" id="repas">
<?php
   foreach( $lesLibelles as $leLibelle) 
{
	$nomrepas = $leLibelle['LIBELLEJR'];
	$IDJR = $leLibelle['IDJR'];

	$conserne=' (';
	if($leLibelle['GIM']==1)
		$conserne.=' Gyms ';
	if($leLibelle['JUGE']==1)
		$conserne.=' juges ';
	$conserne.=')';

?>
       <option value="<?php echo $IDJR; ?>"><?php echo $nomrepas . $conserne; ?></option>
<?php
}
?>
       </select>

   </p>

	</table>
    <p /><input type="submit" value = "valider" /> 
     </form>

<?php
	if (isset($_POST['repas']))
{
?>



<?php




?><h2><?php echo $libellejour;
	?>	
</P>
<?php
		$nbTotal=$nbRepasJuges+$nbRepasGym;
?>

<table border=3px>
	<tr>
		<th>
			Nombre de Juges
		</th>
		<th>
			Nombre de Gym
		</th>
		<th>
			Nombre Total de personnes
		</th>
	</tr>	
	<tr>
		<td>
			<?php echo $nbRepasJuges; ?>
		</td>
		<td>
			<?php echo $nbRepasGym; ?>
		</td>
		<td>
			<?php echo $nbTotal; ?>
		</td>
	</tr>


<?php
}
?>
</body>