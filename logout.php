<?php

		//Démarrer la session
		session_start();
		// si un utilisateur est authentifié (session en cours)
		if(isset($_SESSION['client']) || isset($_SESSION['admin'])){
			//détruire les variables de sessions
			session_unset();
			//détruire la session
			session_destroy();
		}
		header("Location:TP5.php");
		
?>
