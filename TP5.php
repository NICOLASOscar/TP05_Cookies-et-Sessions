 <?php
    //Exercice 2 : Question 2
     
    //Démarrer la session
	session_start();
	
	//Script du traitement du formulaire d'authentification
	if(isset($_POST["Exo2Envoyer"])){
		$login=$_POST["login"];
		$mdp=$_POST["passwd"];
		//si un utilisateur normal (client): s'assurer que le nom et le mot-de-passe sont corrects
			
		//Variable de session "nom"
		if($login=="client" && $mdp=="client123"){
			$_SESSION["nom"]= $login;
			$_SESSION["authentifie"]=true;//Variable de session "authentifie"
			$_SESSION["admin"]=false; //Variable de session "admin"
			//redirection vers la page general.php
			header("Location:general.php");
		}
		//si utilisateur Admin

		else if($login=="admin" && $mdp=="admin123"){
			$_SESSION["nom"]= $login;
			$_SESSION["authentifie"]=true;//Variable de session "authentifie"
			$_SESSION["admin"]=true; //Variable de session "admin"
			//redirection vers la page gestion.php
			header("Location:gestion.php");
		}
	}	  

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>TP5 : web dynamique</title>
        <meta charset="utf-8" />
		<?php
		//Exercice 1 : Question 2
		
		//si le cookie existe (isset)
		if(isset($_COOKIE["theme"])){
			//on récupère le theme choisi enregistré dans le cookie
			$style=$_COOKIE["theme"];
		}
		else
		
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
		
			if(isset($_SESSION['client']) || isset($_SESSION['admin'])){ // si un utilisateur est authentifié
				//redirection vers la page general.php si c'est un client
				if(isset($_SESSION['client'])){
					header("Location:general.php");
				}
				//redirection vers la page gestion.php si c'est un admin
				else if(isset($_SESSION['admin'])){
					header("Location:gestion.php");
				}
			}
			else{
				// sinon on affiche le formulaire
				header("Location:TP5.php");
			}

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