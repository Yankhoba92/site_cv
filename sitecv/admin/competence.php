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
		$resultat = $pdo->prepare("INSERT INTO competences (competence, niveau) VALUES (:competence, :niveau)");
        $succes = $resultat->execute(array( // execute retourne TRUE en cas de succès de la requête, sinon FALSE
			':competence'=> $_POST['competence'],
			':niveau'=> $_POST['niveau'],
		));
		if ($succes) {
			// Si le competence a été ajouté alert succes
			$contenu .= '<div class="alert alert-success">Le competence a été ajouté.</div>';
		} else {
			// sinon danger le competence n'a pas été ajouté
			$contenu .= '<div class="alert alert-danger">Le competence n\'a pas été ajouté.</div>';
		}
	}
}

echo $contenu; // pour afficher les messages et le tableau des produits

// 3- Formulaire de competences 
?>
    <div class="container">
		<div class="row alert bg-info">
			<h1 class ="mt-4; text-white ">Ajouter un compétence</h1>
		</div>
        <form action="" method="post" enctype="multipart/form-data" ><!-- l'attribut enctype ="multipart/form-data" spécifie que le formulaire envoie des données binaires (fichier) et du texyte (champs du formulaire ) : permet d'uploader un fichier -->

            <div><label for="competence">Comptence</label></div>
            <div><input type="text" name="competence" id="competence" value="<?php echo $competence['competence'] ?? ''; ?>"></div>

            <div><label for="niveau">Niveau</label></div>
            <div><input type="text" name="niveau" id="niveau" value="<?php echo $competence['niveau'] ?? ''; ?>"></div>


            <div><input type="submit" value="Enregistrer" class="btn btn-info mt-4"></div>


        </form>
    </div>


<?php
