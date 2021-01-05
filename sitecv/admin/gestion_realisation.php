<?php 
require_once '../inc/init.php'; // on remonte vers le dossier parent avec ../
require_once '../inc/header.php';



if (!empty($_GET['id_realisation'])) { 
    $id_realisation = htmlspecialchars($_GET['id_realisation']);
    $query = $pdo->prepare('SELECT * FROM realisations WHERE id_realisation = ?');
    $query->execute(array($id_realisation));
    $realisation = $query-> fetch(PDO::FETCH_ASSOC);
  

    if (!empty($_POST)){
      $titre = $_POST ['titre']; 
      $description = $_POST ['description'];
        $photo_bdd = "";
        $photo_fiche = "";
      if(isset($_POST['photo_actuelle'])){ // si existe "photo_actuelle" dans $_POST, c'est que je suis entrain de modifier le produit que je veut remettre le chemin de la photo en BDD
        $photo_bdd = $_POST['photo_actuelle']; // alors on affecte le chemin de la photo actuelle à la variable $photo_bdd quui est inséré en BDD.

    }

    if(!empty($_FILES['photo']['name'])){// si ,'est pas vide le nom de la photo, c'est qu'un fichier esst en cours d'upload

        $nom_fichier = $_FILES['photo']['name']; // on recupére le nom du fichier

        $photo_bdd = 'assets/img/' . $nom_fichier; // cette variable contient le chemin relatif de l'image que l'on insére en BDD elle est dans le dossier photo et s'appelle ($nom_fichier).

        copy($_FILES['photo']['tmp_name'], '../' .  $photo_bdd); // on copie le fichier photo temporaire qui est dans $_FILES['photo']['tmp_name'] vers le répertoire dont le chemin est "../photo/nom_fichier".

    }
      
      $requeteUp = $pdo->prepare('UPDATE realisations SET titre=?, description=?, photo=? WHERE id_realisation =?') 
      or die (print_r($pdo->errorInfo()));
      $requeteUp->execute(array ($titre, $description, $photo_bdd, $id_realisation));
    //   $realisation=$requeteUp->fetch(PDO::FETCH_ASSOC);

      header('location:admin.php');
      exit;
      
    }
}

?>

    <div class="container">
        <div class="row alert bg-info">
            <h1 class="text-white">Modification réalisations</h1>
        </div>
        <div class="row">

                <form action="" method="post" enctype="multipart/form-data">   
                
                <div><label for="titre">Titre</label></div>
                <div><input type="text" name="titre" id="titre" value="<?php echo $realisation['titre'] ?? ''; ?>"></div>

                <div><label for="description">Description</label></div>
                <div><input type="text" name="description" id="description" value="<?php echo $realisation['description'] ?? ''; ?>"></div>
                    
                <div><label for="photo">Photo</label></div>
                <div><input type="file" name="photo" value="<?php echo $realisation['photo'] ?? ''; ?>"></div>
                <?php
                    if(isset($realisation['photo'])){ 
                        echo'<div>Photo actuelle du realisation</div>';
                        echo'<img src="'. '../'. $realisation['photo'].'"style="width:90px"></div>';
                        echo '<input type="hidden" name="photo_actuelle" value="' . $realisation['photo'] .'"  >';

                    }
                ?>
                

                <div><input type="submit" value="Modifier" class="btn btn-info mt-4"></div>
                                
            </form>
            
        </div>

    </div>

