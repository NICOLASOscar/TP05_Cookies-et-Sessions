 <?php
 /*	//Exercice 2 : Question 2
     
    //Démarrer la session
	session_start();
	
	//Script du traitement du formulaire d'authentification
	if(....){
		$login=....;
		$mdp=...;
		
		if(.....){ //si un utilisateur normal (client): s'assurer que le nom et le mot-de-passe sont corrects
			$_SESSION["nom"]=...; //Variable de session "nom"
			$_SESSION["authentifie"]=true;//Variable de session "authentifie"
			$_SESSION["admin"]=false; //Variable de session "admin"
			.....; //redirection vers la page general.php
		}
		else if (....){//si utilisateur Admin
			.....;//Variable de session "nom"
			.....;//Variable de session "authentifie"
			.....;//Variable de session "admin"
			.....; //redirection vers la page gestion.php
		}
	}	  
*/	
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>TP5 : web dynamique</title>
        <meta charset="utf-8" />
		<?php
		//Exercice 1 : Question 2
		/*
		if (...){ //si le cookie existe (isset)
			$style=...;	//on récupère le theme choisi enregistré dans le cookie
		}
		else
		*/	
			$style="clair"; // valeur par défaut
		?>
		<link rel="stylesheet" href ="<?php echo $style; ?>.css"/>
    
	
	</head>
    <body>
		<h1>TP5 : web dynamique<br>Cookies & Sessions</h1>
		<h2>Exercice I : Cookies</h2>

		<form method="post" action="theme.php">		
			<label>Choisir votre thème préféré : </label>
			<select name="Choixtheme">
				<option value="sombre">Sombre</option>
				<option value="clair">Clair (par defaut)</option>
			</select>
			<input type="submit" name="Exo1Envoyer" Value="Envoyer"/>
		</form>
			
		<h2>Exercice II : Sessions et Base de données</h2>
		<?php
			//Exercice 2 : Question 5
		/*
			if(){ // si un utilisateur est authentifié
				
			}
			else{ // sinon on affiche le formulaire
		*/
		?>		
		<!-- Formulaire d'authentification-->
     	<form action="" method="post">
     		<fieldset>
     			<legend>Formulaire d'authentification</legend>
     			<label>Login :</label>
     			<input type="text" name="login" placeholder="Entrez votre login" required>
     			<label>Password :</label>
     			<input type="password" name="passwd"  placeholder="Entrez votre mot de passe" required>
     			<input type="submit" name="Exo2Envoyer" value="Envoyer"/>
     		</fieldset>
     	</form>
		<?php
		//	} 
		?>
    </body>
</html>