<!-- connexion
	auteur : Rémi
	-->
	<div class='connexion'>
		<center>
			<img src='images/logo.png' width="200" />
			<p class='message'>Bienvenue sur le site du comité départemental FSCF du Maine et Loire pour la gestion du championnat national de gymnastique de fin juin 2017. Ce site est protégé par un mot de passe.</p>

			<?php
			if(isset($erreur) AND $erreur==true)
				echo "<span style='color: red; display: inline-block; margin-bottom: 10px;'>Le mot de passe est incorect</span>";
			?>

			<form method="post" action="index.php?action=connexion">
				<label>mot de passe : </label>
				<input type='password' maxlength="30" size="30" name='password' autofocus="" />
				<input type='submit' value='envoyer' />
			</form>

			<p><i>Pour l'épreuve E4 le mot de passe est : gym1234*</i></p>
		</center>
	</div>