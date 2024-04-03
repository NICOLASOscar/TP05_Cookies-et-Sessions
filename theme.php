<?php

	if(isset($_POST['theme'])){		
		//Créer le cookie pour y enregistrer le thème choisi par l'utilisateur
		setcookie("theme", $_POST['theme'], time() + 3600);
	}
	header("Location: TP5.php");
	
?>