<?php
require_once '../inc/init.php'; 
require_once '../inc/header.php';

$contenu = '';

if (!empty($_POST)) {   // si le formulaire a été envoyé

	//-----------------------
	// Photo
	// debug($_FILES);

	if (!empty($_FILES['photo']['name'])) {  // si un fichier est en cours d'upload

		$nom_fichier = $_FILES['photo']['name'];  // contient le nom du fichier en cours d'upload

		$photo_bdd = 'assets/img/' . $nom_fichier;  // contient le chemin relatif de la photo inséré en BDD

        copy($_FILES['photo']['tmp_name'], '../' . $photo_bdd);  // copie le fichier temporaire qui se trouve dans $_FILES['photo']['tmp_name'] vers la destination $photo_bdd
	}
	//------------------------
	if (empty($contenu)) { // si la variable est vide c'est qu'il n'y a pas d'erreur sur notre formulaire : on peut faire l'insertion en BDD

		// échappement des données :
		foreach ($_POST as $indice => $valeur) {
			$_POST[$indice] = htmlspecialchars($valeur); // pour se prémunir des risques XSS (JS) ou CSS. Cette fonction remplace les < et > en entités HTML (&lt; et &gt;)
		}
		// Requête pour l'insertion en base de donée
		$resultat = $pdo->prepare("INSERT INTO loisirs (loisir, photo) VALUES (:loisir,  :photo)");
		$succes = $resultat->execute(array(   // execute retourne TRUE en cas de succès de la requête, sinon FALSE
			':loisir'          => $_POST['loisir'],
			':photo'        => $photo_bdd,
		));

		if ($succes) {
			// Si le loisir a été ajouté alert succes
			$contenu .= '<div class="alert alert-success">Le loisir a été ajouté.</div>';
		} else {
			// sinon danger le loisir n'a pas été ajouté
			$contenu .= '<div class="alert alert-danger">Le loisir n\'a pas été ajouté.</div>';
		}
	}
} // fin du if (!empty($_POST))

// ------------------------------------ AFFICHAGE -------------------------------
?>

<?php echo $contenu; ?>
    <div class="container">
		<div class="row alert bg-info">
			<h1 class ="mt-4; text-white ">Ajouter un loisir</h1>
		</div>
        <form action="" method="post" enctype="multipart/form-data" >

            <div><label for="loisir">Loisir</label></div>
            <div><input type="text" name="loisir" id="loisir" value="<?php echo $loisir['loisir'] ?? ''; ?>"></div>


            <div><label for="photo">Photo</label></div>
            <div><input type="file" name="photo" id="photo" value="<?php echo $loisir['photo'] ?? ''; ?>"></div>
            
            <div><input type="submit" value="Enregistrer" class="btn btn-info mt-4"></div>

	    </form>		

</body>
</html>