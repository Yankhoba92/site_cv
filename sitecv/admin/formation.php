<?php 

require_once '../inc/init.php'; // on remonte vers le dossier parent avec ../
require_once '../inc/header.php';

if (!empty($_POST)) {   // si le formulaire a été envoyé

	//------------------------
	if (empty($contenu)) { // si la variable est vide c'est qu'il n'y a pas d'erreur sur notre formulaire : on peut faire l'insertion en BDD

		// échappement des données :
		foreach ($_POST as $indice => $valeur) {
			$_POST[$indice] = htmlspecialchars($valeur); // pour se prémunir des risques XSS (JS) ou CSS. Cette fonction remplace les < et > en entités HTML (&lt; et &gt;)
		}

		// Requête pour l'insertion en base de donée
		$resultat = $pdo->prepare("INSERT INTO formations (titre, date_debut, date_fin, description) VALUES (:titre, :date_debut, :date_fin, :description)");
        $succes = $resultat->execute(array(   // execute retourne TRUE en cas de succès de la requête, sinon FALSE
			':titre'=> $_POST['titre'],
			':date_debut'=> $_POST['date_debut'],
			':date_fin'=> $_POST['date_fin'],
			':description'=> $_POST['description'],
		));

		if ($succes) {
			// Si la formation a été ajouté alert succes
			$contenu .= '<div class="alert alert-success">La formation a été ajouté.</div>';
		} else {
			// sinon danger la formation n'a pas été ajouté
			$contenu .= '<div class="alert alert-danger">La formation n\'a pas été ajouté.</div>';
		}
	}
}
echo $contenu; // pour afficher les messages et le tableau des produits

// 3- Formulaire de formation 
?>
    <div class="container">
		<div class="row alert bg-info">
			<h1 class ="mt-4; text-white ">Ajouter une formation</h1>
		</div>

		<form action="" method="post" enctype="multipart/form-data" ><!-- l'attribut enctype ="multipart/form-data" spécifie que le formulaire envoie des données binaires (fichier) et du texyte (champs du formulaire ) : permet d'uploader un fichier -->
		
            <div><label for="titre">Titre</label></div>
            <div><input type="text" name="titre" id="titre" value="<?php echo $formation['titre'] ?? ''; ?>"></div>

            <div><label for="date_debut">Date de début</label></div>
            <div><input type="text" name="date_debut" id="date_debut" value="<?php echo $formation['date_debut'] ?? ''; ?>"></div>

            <div><label for="date_fin">Date de fin</label></div>
            <div><input type="text" name="date_fin" id="date_fin" value="<?php echo $formation['date_fin'] ?? ''; ?>"></div>
            
            <div><label for="description">Description</label></div>
            <div><textarea name="description" id="description"><?php echo $formation['description'] ?? ''; ?></textarea></div>

            <div><input type="submit" value="Enregistrer" class="btn btn-info mt-4"></div>


        </form>
    </div>



