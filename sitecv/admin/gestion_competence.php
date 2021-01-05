<?php 
    require_once '../inc/init.php'; // on remonte vers le dossier parent avec ../
    require_once '../inc/header.php';

    if (!empty($_GET['id_competence'])) { 
        $id_competence = htmlspecialchars($_GET['id_competence']);
        $query = $pdo->prepare('SELECT * FROM competences WHERE id_competence = ?');
        $query->execute(array($id_competence));
        $formation = $query-> fetch(PDO::FETCH_ASSOC);

        if (!empty($_POST)){
          $competence = $_POST ['competence']; 
          $niveau = $_POST ['niveau'];
          $requeteUp = $pdo->prepare('UPDATE competences SET competence=?, niveau=? WHERE id_competence =?') 
          or die (print_r($pdo->errorInfo()));
          $requeteUp->execute(array ($competence, $niveau, $id_competence));
        //   $formation=$requeteUp->fetch(PDO::FETCH_ASSOC);
    
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
                <div><label for="competence">Competence</label></div>
                <div><input type="text" name="competence" id="competence" value="<?php echo $formation['competence'] ?? ''; ?>"></div>
                <div><label for="niveau">Niveau</label></div>
                <div><input type="text" name="niveau" id="niveau" value="<?php echo $formation['niveau'] ?? ''; ?>"></div>
                <div><input type="submit" value="Modifier" class="btn btn-info mt-4"></div>
            </form>
            
        </div>

    </div>
    


