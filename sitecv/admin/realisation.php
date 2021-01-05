<?php
require_once '../inc/init.php'; 
require_once '../inc/header.php';
$contenu = '';

if (!empty($_POST)) {   // si le formulaire a été envoyé
 
	if(!empty($_FILES['photo']['name'])){// si ,'est pas vide le nom de la photo, c'est qu'un fichier esst en cours d'upload
        $nom_fichier = $_FILES['photo']['name']; // on recupére le nom du fichier
        $photo_bdd =  'assets/img/' . $nom_fichier; // cette variable contient le chemin relatif de l'image que l'on insére en BDD elle est dans le dossier photo et s'appelle ($nom_fichier).
        copy($_FILES['photo']['tmp_name'], '../' . $photo_bdd); // on copie le fichier photo temporaire qui est dans $_FILES['photo']['tmp_name'] vers le répertoire dont le chemin est "../photo/nom_fichier".
    }
	//------------------------
	if (empty($contenu)) { // si la variable est vide c'est qu'il n'y a pas d'erreur sur notre formulaire : on peut faire l'insertion en BDD
		// échappement des données :
		foreach ($_POST as $indice => $valeur) {
			$_POST[$indice] = htmlspecialchars($valeur); // pour se prémunir des risques XSS (JS) ou CSS. Cette fonction remplace les < et > en entités HTML (&lt; et &gt;)
		}
		// Requête pour l'insertion en base de donée
		$resultat = $pdo->prepare("INSERT INTO realisations (titre, description, photo) VALUES (:titre, :description, :photo)");
		$succes = $resultat->execute(array(   // execute retourne TRUE en cas de succès de la requête, sinon FALSE
            ':titre'          => $_POST['titre'],
            ':description'    => $_POST['description'],
            ':photo'          => $photo_bdd,
		));
		if ($succes) {
			// Si la réalisation a été ajouté alert succes
			$contenu .= '<div class="alert alert-success">La réalisation a été ajouté.</div>';
		} else {
			// sinon danger la réalisation n'a pas été ajouté
			$contenu .= '<div class="alert alert-danger">La réalisation n\'a pas été ajouté.</div>';
		}
	}
} // fin du if (!empty($_POST))

// ------------------------------------ AFFICHAGE -------------------------------
?>

<?php echo $contenu; ?>
    <div class="container">
	<div class="row alert bg-info">
		<h1 class ="mt-4; text-white ">Ajouter une réalisation</h1>
	</div>

        <form action="" method="post" enctype="multipart/form-data" >
            <div><label for="titre">Titre</label></div>
            <div><input type="text" name="titre" id="titre" value="<?php echo $realisation['titre'] ?? ''; ?>"></div>

            <div><label for="description">Description</label></div>
            <div><input type="text" name="description" id="description" value="<?php echo $realisation['description'] ?? ''; ?>"></div>


            <div><label for="photo">Photo</label></div>
            <div><input type="file" name="photo" id="photo" value="<?php echo $realisation['photo'] ?? ''; ?>"></div>
            
            <div><input type="submit" value="Enregistrer" class="btn btn-info mt-4"></div>

	    </form>		

</body>
</html>