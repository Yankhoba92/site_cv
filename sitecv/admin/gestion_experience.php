<?php 
    require_once '../inc/init.php'; // on remonte vers le dossier parent avec ../
    require_once '../inc/header.php';


  
    if (!empty($_GET['id_experience'])) { 
        $id_experience = htmlspecialchars($_GET['id_experience']);
        $query = $pdo->prepare('SELECT * FROM experiences WHERE id_experience = ?');
        $query->execute(array($id_experience));
        $experience = $query-> fetch(PDO::FETCH_ASSOC);
      
    
        if (!empty($_POST)){
          $titre = $_POST ['titre']; 
          $description = $_POST ['description'];
          $date_debut = $_POST ['date_debut'];
          $date_fin = $_POST ['date_fin'];
          
          $requeteUp = $pdo->prepare('UPDATE experiences SET titre=?, description=?, date_debut=?, date_fin=? WHERE id_experience =?') 
          or die (print_r($pdo->errorInfo()));
          $requeteUp->execute(array ($titre, $description, $date_debut, $date_fin, $id_experience));
        //   $experience=$requeteUp->fetch(PDO::FETCH_ASSOC);
    
          header('location:admin.php');
          exit;
          
        }
    }
    ?>


    <div class="container">
        <div class="row alert bg-info">
            <h1 class="text-white">Modification</h1>
        </div>
        <div class="row">

            <form action="" method="post" enctype="multipart/form-data">   
                <div><label for="titre">Titre</label></div>
                <div><input type="text" name="titre" id="titre" value="<?php echo $experience['titre'] ?? ''; ?>"></div>
                    
                <div><label for="date_debut">Date début</label></div>
                <div><input type="text" name="date_debut" id="date_debut" value="<?php echo $experience['date_debut'] ?? ''; ?>"></div>
                
                <div><label for="date_fin">Date fin</label></div>
                <div><input type="text" name="date_fin" id="date_fin" value="<?php echo $experience['date_fin'] ?? ''; ?>"></div>

                <div><label for="description">Description</label></div>
                <div><textarea name="description" id="description"><?php echo $experience['description'] ?? ''; ?></textarea></div>

                <div><input type="submit" value="Modifier" class="btn btn-info mt-4"></div>


                
            </form>
            
        </div>

    </div>
    


