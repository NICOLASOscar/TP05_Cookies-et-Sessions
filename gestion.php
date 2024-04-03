<?php 
	//Exercice 2 : QUESTION 4	
		//Démarrer la session
	session_start();
	// si l'utilisateur n'est pas authentifié (ni client && ni admin) (utiliser les variables de sessions)
	if(!isset($_SESSION['client']) && !isset($_SESSION['admin'])){
	//==> redirection vers la page d'authentification TP5.php
		header("Location:TP5.php");
	}
	//si l'utilisateur est un adminstrateur ==> On affiche la page
	if(isset($_SESSION['admin'])){
		// Récupérer le nom (login) de l'adminstrateur
		$nom = $_SESSION['admin'];
	}
?>
		
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Gestion</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<h1>Gestion du stock</h1>
		<p>Bonjour ADMIN <br><a href="logout.php">Déconnexion</a> </p>
		

		<?php
			//Exercice 2 : QUESTION 7 - 1 
			
		/*
			try{
				
			//Ouvrir la connexion à la bd "TP5" 
			require("connexion.php"); //créer le fichier connexion.php				
			$reqSQL=...; //Requete sql pour récuperer les noms des produits et leurs références de la table produit pour la catégorie boisson (CodeCategorie =1)
			//préparer, exécuter la requête et récuperer le résultat
			//Fermer la connexion
			}
			catch(Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		*/
		?>
		
		<form action="" method="post">
			<fieldset>
				<legend>Modification du stock pour la catégorie "boissons" (CodeCategorie 1)</legend>
				<label>Produit :</label>
				<select name="produit">
				<?php					
					//Exercice 2 : QUESTION 7 - 2
					//parcourir le résultat de la requête ci-dessus et ajouter les options dynamiquement
				?>
				
					<option value="ref1"> Nom Produit 1</option>
					<option value="ref2"> Nom Produit 2</option>
				</select>
				
				<br><br>
				<label>Quantité :</label>
				<input type="number" name="quantite" required>
				
				<br><br>
				<input type="submit" name="Modifier"/>
			</fieldset>
		</form>
		
		<?php
			//Exercice 2 : QUESTION 8 : script de traitement du formulaire de modification du stock				
			/*

			if(...){ 
				try{
					//Ouvrir la connexion à la bd
					require("connexion.php"); 
					$quantite=...;//récuperer du formulaire la nouvelle quantite du stock
					$ref=...;//récuperer du formulaire la ref du produit à modifier
											
					$reqSQL=...;// requete pour modifier le stock du produit dont la réference est $ref
					//préparer et exécuter la requête
					
					echo "<p>Stock modifié</p>" ;
						...;//Fermer la connexion
				}                
				catch(Exception $e){
					die("Erreur : " . $e->getMessage());
				}
			}				
			*/
		?>
		
	 </body>	
</html>	
