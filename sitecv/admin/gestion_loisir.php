<?php 
require_once '../inc/init.php'; // on remonte vers le dossier parent avec ../
require_once '../inc/header.php';


if (!empty($_GET['id_loisir'])) { 
    $id_loisir = htmlspecialchars($_GET['id_loisir']);
    $query = $pdo->prepare('SELECT * FROM loisirs WHERE id_loisir = ?');
    $query->execute(array($id_loisir));
    $loisir = $query-> fetch(PDO::FETCH_ASSOC);


    if (!empty($_POST)){
      $loisir = $_POST ['loisir']; 
      $photo_bdd = "";
      if(isset($_POST['photo_actuelle'])){ // si existe "photo_actuelle" dans $_POST, c'est que je suis entrain de modifier le produit que je veut remettre le chemin de la photo en BDD
        $photo_bdd = $_POST['photo_actuelle']; // alors on affecte le chemin de la photo actuelle à la variable $photo_bdd quui est inséré en BDD.
    }
    if(!empty($_FILES['photo']['name'])){// si ,'est pas vide le nom de la photo, c'est qu'un fichier esst en cours d'upload
        $nom_fichier = $_FILES['photo']['name']; // on recupére le nom du fichier
        $photo_bdd =  'assets/img/' . $nom_fichier; // cette variable contient le chemin relatif de l'image que l'on insére en BDD elle est dans le dossier photo et s'appelle ($nom_fichier).
        copy($_FILES['photo']['tmp_name'], '../' . $photo_bdd); // on copie le fichier photo temporaire qui est dans $_FILES['photo']['tmp_name'] vers le répertoire dont le chemin est "../photo/nom_fichier".
    }

    $requeteUp = $pdo->prepare('UPDATE loisirs SET loisir=?,  photo=? WHERE id_loisir =?') 
    or die (print_r($pdo->errorInfo()));
    $requeteUp->execute(array ($loisir, $photo_bdd, $id_loisir));
  //   $loisir=$requeteUp->fetch(PDO::FETCH_ASSOC);

    header('location:admin.php');
    exit;
      
    }
}

?>

    <div class="container">
        <div class="row alert bg-info">
            <h1 class="text-white">Modification loisir</h1>
        </div>
        <div class="row">

                <form action="" method="post" enctype="multipart/form-data">   
                
                <div><label for="loisir">Loisir</label></div>
                <div><input type="text" name="loisir" id="loisir" value="<?php echo $loisir['loisir'] ?? ''; ?>"></div>
                    
                <div><label for="photo">Photo</label></div>
                <div><input type="file" name="photo" value="<?php echo $loisir['photo'] ?? ''; ?>"></div>
                <?php
                    if(isset($loisir['photo'])){ 
                        echo'<div>Photo actuelle du loisir</div>';
                        echo'<img src="'. '../'. $loisir['photo'].'"style="width:90px"></div>';
                        echo '<input type="hidden" name="photo_actuelle" value="' . $loisir['photo'] .'"  >';

                    }
                ?>

                <div><input type="submit" value="Modifier" class="btn btn-info mt-4"></div>
                                
            </form>
            
        </div>

    </div>

