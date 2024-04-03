<?php 

	//Exercice 2 : QUESTION 3
	//Démarrer la session
	session_start();
	// si l'utilisateur n'est pas authentifié (ni client && ni admin) (utiliser les variables de sessions)
	if(!isset($_SESSION['client']) && !isset($_SESSION['admin'])){
	//==> redirection vers la page d'authentification TP5.php
		header("Location:TP5.php");
	}
	//SINON  (l'utilisateur est authentifié (client ou admin) ==> On affiche la page
	// Récupérer le nom (login) de l'utilisateur
	$nom = $_SESSION['client'] ?? $_SESSION['admin'];

?>
	
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>General</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<h1>Page générale</h1>
		<p>Bonjour <?php echo $nom; ?> ! <br><a href="logout.php">Déconnexion</a></p>			
	 </body>	
</html>