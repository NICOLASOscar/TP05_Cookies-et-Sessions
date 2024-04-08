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
			
		
			try{
				
			//Ouvrir la connexion à la bd "TP5" 
			$connexion= new PDO('mysql:host=localhost;dbname=TP5', 'root', '');
			
			require("connexion.php"); //créer le fichier connexion.php				
			//Requete sql pour récuperer les noms des produits et leurs références de la table produit pour la catégorie boisson (CodeCategorie =1)
			$reqSQL="SELECT ref, nom FROM produit WHERE CodeCategorie=1"; 
			//préparer, exécuter la requête et récuperer le résultat
			$stmt = $connexion->prepare($reqSQL);
			$stmt->execute();
			//Fermer la connexion
			$connexion=null;
			}
			catch(Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		
		?>
		
		<form action="" method="post">
			<fieldset>
				<legend>Modification du stock pour la catégorie "boissons" (CodeCategorie 1)</legend>
				<label>Produit :</label>
				<select name="produit">
				<?php					
					//Exercice 2 : QUESTION 7 - 2
					//parcourir le résultat de la requête ci-dessus et ajouter les options dynamiquement
					foreach($resultat as $ligne){
						echo "<option value='".$ligne['ref']."'>".$ligne['nom']."</option>";
					}
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
			

			if(isset($_POST['Modifier'])){
				try{
					$connexion= new PDO('mysql:host=localhost;dbname=TP5', 'root', '');
					//Ouvrir la connexion à la bd
					require("connexion.php"); 
					//récuperer du formulaire la nouvelle quantite du stock
					$quantite=$_POST['quantite'];
					//récuperer du formulaire la ref du produit à modifier
					$ref=$_POST['produit'];						
					// requete pour modifier le stock du produit dont la réference est $ref
					$reqSQL="UPDATE produit SET stock=stock+$quantite WHERE ref='$ref'";
					//préparer et exécuter la requête
					$stmt = $connexion->prepare($reqSQL);
					$stmt->execute();
					
					echo "<p>Stock modifié</p>" ;
						//Fermer la connexion
						$connexion=null;
				}                
				catch(Exception $e){
					die("Erreur : " . $e->getMessage());
				}
			}				
		?>
		
	 </body>	
</html>	
