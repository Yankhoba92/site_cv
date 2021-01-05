<?php

require_once '../inc/init.php'; // on remonte vers le dossier parent avec ../
require_once '../inc/header.php';

// Vérification de ma connexion à la pade admin s'il je suis pas connecte ça me redirige vers ma page de connexion 
if(!estConnecte()){
    header('location:../connexion.php');
    exit;
}

// Affichage et suppression des formation   
    if(isset($_GET['id_formation'])) { 
        // s'il existe id_formation dans l'url c'est que j'ai demandé la suppression de cette id 
        // requette pour la suppression de l'id
        $resultat = executeRequete("DELETE FROM formations WHERE id_formation =:id_formation", array(':id_formation' => $_GET['id_formation']));
        if($resultat->rowCount() == 1) { 
            // Si l'id demandé figure dans ma base donnée j'éxecute la suppression
            $contenu .= '<div class ="alert alert-success">L\'a formation bien été supprimé.</div>';
        }else{ 
            // Sinon j'envoie une alerte comme quoi l'id n'a pas pue etre supprimé
            $contenu .= '<div class ="alert alert-danger">Le produit n\'a pu être supprimé.</div>';
        }
    }
    $contenu=''; // déclaration de ma variable pour l'affichage du contenu
// Requéte pour l'affichage de mes formations
    $resultat = executeRequete("SELECT id_formation, titre, date_debut, date_fin, description FROM formations");
    
    // Tableau pour afficher tous les données 
        $contenu.= '<table class="table">';
            $contenu .= '<tr>';
                $contenu .= '<th>Id</th>';
                $contenu .= '<th>Titre</th>';
                $contenu .=  '<th>Date début</th>';
                $contenu .= '<th>Date fin</th>';
                $contenu .= '<th>Description</th>';
                $contenu .= '<th>Action</th>';
            $contenu .= '</tr>';
            while ($formation = $resultat->fetch(PDO::FETCH_ASSOC)) {
                // Création de ma boucle while pourqu'elle puisse parcourir le tableau avec fetch pour l'affichage
                $contenu .= '<tr>'; 
                    foreach($formation as $indice => $information){
                        // L'utilisation de ma boucle foreach pourqu'il passe en revue chaque ligne de mon tableau 
                        $contenu .= '<td>' . $information . '</td>'; 
                    }                    
                        $contenu.= '<td><a href="gestion_formation.php?id_formation='. $formation['id_formation'] .'"class="btn btn-block btn-info">modifier</a><a href="?id_formation='. $formation['id_formation'] . '" onclick="return confirm(\'Etes-vous certain de vouloir supprimer ce produit? \');" class="btn btn-block btn-danger">supprimer</a></td>';

                $contenu .= '</tr>';
            }
        $contenu.='</table>';

// Affichage et suppression des competence
    $contenu1=''; // pour l'affichage du contenu1

    if(isset($_GET['id_competence'])) { 
        $resultat = executeRequete("DELETE FROM competences WHERE id_competence =:id_competence", array(':id_competence' => $_GET['id_competence']));
        if($resultat->rowCount() == 1) { 
            $contenu1 .= '<div class ="alert alert-success">Le produit a bien été supprimé.</div>';
        }else{ 
            $contenu1 .= '<div class ="alert alert-danger">Le produit n\'a pu être supprimé.</div>';
        }
    }
    $resultat = executeRequete("SELECT id_competence, competence, niveau FROM competences");
    // Tableau pour afficher tous les données 
        $contenu1.= '<table class="table">';
            $contenu1 .= '<tr>';
                $contenu1 .= '<th>Id</th>';
                $contenu1 .= '<th>Comptences</th>';
                $contenu1 .= '<th>Nivaux</th>';
                $contenu1 .= '<th>Action</th>';

            $contenu1 .= '</tr>';
            while ($comptence = $resultat->fetch(PDO::FETCH_ASSOC)) {
        
                $contenu1 .= '<tr>'; 
                    foreach($comptence as $indice => $information){ 
                        $contenu1 .= '<td>' . $information . '</td>'; 
                    }                    
                        $contenu1.= '<td><a href="gestion_competence.php?id_competence='. $comptence['id_competence'] .'"class="btn btn-block btn-info">modifier</a><a href="?id_competence='. $comptence['id_competence'] . '" onclick="return confirm(\'Etes-vous certain de vouloir supprimer ce produit? \');" class="btn btn-block btn-danger">supprimer</a></td>';

                $contenu1 .= '</tr>';
            }
        $contenu1.='</table>';

// Affichage et suppression experience
 $contenu2='';
    if(isset($_GET['id_experience'])) { 
        $resultat = executeRequete("DELETE FROM experiences WHERE id_experience =:id_experience", array(':id_experience' => $_GET['id_experience']));
        if($resultat->rowCount() == 1) { 
            $contenu2 .= '<div class ="alert alert-success">Le produit a bien été supprimé.</div>';
        }else{ 
            $contenu2 .= '<div class ="alert alert-danger">Le produit n\'a pu être supprimé.</div>';
        }
    }
    // pour l'affichage du contenu1
    $resultat = executeRequete("SELECT id_experience, titre, date_debut, date_fin, description FROM experiences");
    // Tableau pour afficher tous les données 
        $contenu2.= '<table class="table">';
            $contenu2 .= '<tr>';
                $contenu2 .= '<th>Id</th>';
                $contenu2 .= '<th>Titre</th>';
                $contenu2 .=  '<th>Date début</th>';
                $contenu2 .= '<th>Date fin</th>';
                $contenu2 .= '<th>Description</th>';
                $contenu2 .= '<th>Action</th>';
            $contenu2 .= '</tr>';
            while ($comptence = $resultat->fetch(PDO::FETCH_ASSOC)) {
        
                $contenu2 .= '<tr>'; 
                    foreach($comptence as $indice => $information){ 
                        $contenu2 .= '<td>' . $information . '</td>'; 
                    }                    
                        $contenu2.= '<td><a href="gestion_experience.php?id_experience='. $comptence['id_experience'] .'"class="btn btn-block btn-info">modifier</a><a href="?id_experience='. $comptence['id_experience'] . '" onclick="return confirm(\'Etes-vous certain de vouloir supprimer ce produit? \');" class="btn btn-block btn-danger">supprimer</a></td>';

                $contenu2 .= '</tr>';
            }
        $contenu2.='</table>';



    if(isset($_GET['id_loisir'])) { 
        $resultat = executeRequete("DELETE FROM loisirs WHERE id_loisir =:id_loisir", array(':id_loisir' => $_GET['id_loisir']));
        if($resultat->rowCount() == 1) { 
            $contenu .= '<div class ="alert alert-success">Le produit a bien été supprimé.</div>';
        }else{ 
            $contenu .= '<div class ="alert alert-danger">Le produit n\'a pu être supprimé.</div>';
        }
    }
// Affichage et suppression loisirs
    $contenu3='';

    $resultat = executeRequete("SELECT id_loisir, loisir,  photo FROM loisirs");

    // print_r($resultat);


    $contenu3.= '<table class="table">';
        // Les entêtes
        $contenu3 .= '<tr>';
            $contenu3 .= '<th>Id</th>';
            $contenu3 .=  '<th>loisirs</th>';
            $contenu3 .= '<th>Photo</th>';
            $contenu3 .= '<th>Action</th>';
        $contenu3 .= '</tr>';

        while ($loisir = $resultat->fetch(PDO::FETCH_ASSOC)) {
        
                $contenu3 .= '<tr>'; 
                    foreach($loisir as $indice => $information){ 

                        if($indice == 'photo'){
    //   var_dump($information);
                            $contenu3 .= '<td><img src="' . '../' . $information . '" style="width:80px"></td>';
                        }else{ 
                            $contenu3 .= '<td>' . $information . '</td>';
                        }
                            
                        }
                        $contenu3.= '<td><a href="gestion_loisir.php?id_loisir='. $loisir['id_loisir'] .'"class="btn btn-block btn-info">modifier</a><a href="?id_loisir='. $loisir['id_loisir'] . '" onclick="return confirm(\'Etes-vous certain de vouloir supprimer ce produit? \');" class="btn btn-block btn-danger">supprimer</a></td>'; 

                $contenu3 .= '</tr>';
        }


    $contenu3.='</table>';

// Affichage et suppression realisations
    $contenu4='';
    if(isset($_GET['id_realisation'])) { 
        $resultat = executeRequete("DELETE FROM realisations WHERE id_realisation =:id_realisation", array(':id_realisation' => $_GET['id_realisation']));
        if($resultat->rowCount() == 1) { 
            $contenu4 .= '<div class ="alert alert-success">Le produit a bien été supprimé.</div>';
        }else{ 
            $contenu4 .= '<div class ="alert alert-danger">Le produit n\'a pu être supprimé.</div>';
        }
    }
    // Affichage et suppression loisirs

        $resultat = executeRequete("SELECT id_realisation, titre, description, photo FROM realisations");

        // print_r($resultat);


        $contenu4.= '<table class="table">';
            // Les entêtes
            $contenu4 .= '<tr>';
                $contenu4 .= '<th>Id</th>';
                $contenu4 .=  '<th>Titre</th>';
                $contenu4 .=  '<th>Description</th>';
                $contenu4 .=  '<th>Photo</th>';
                $contenu4 .=  '<th>Action</th>';
            $contenu4 .= '</tr>';

            while ($realisation = $resultat->fetch(PDO::FETCH_ASSOC)) {
            
                    $contenu4 .= '<tr>'; 
                        foreach($realisation as $indice => $information){ 

                            if($indice == 'photo'){
                            // Condition pour l'affichage de ma photo
                                $contenu4 .= '<td><img src="' . '../'. $information . '" style="width:80px"></td>';
                            }else{
                                $contenu4 .= '<td>' . $information . '</td>';
                            }
                                
                            }
                            $contenu4.= '<td><a href="gestion_realisation.php?id_realisation='. $realisation['id_realisation'] .'"class="btn btn-block btn-info">modifier</a><a href="?id_realisation='. $realisation['id_realisation'] . '" onclick="return confirm(\'Etes-vous certain de vouloir supprimer ce produit? \');" class="btn btn-block btn-danger">supprimer</a></td>'; 

                    $contenu4 .= '</tr>';
            }


        $contenu4.='</table>';
?>
 <!-- Affichage des données dans l'html  -->
	
		<div class="row alert bg-info">
            <a href="formation.php"class="text-white"><button type="button" style="margin-right: 58px;margin-top: 11px;" class="btn btn-secondary ml-45 text-white">Ajouter une formation</button></a>
            <h1 class="text-white">Liste des Formations</h1>
        </div>
        <?php echo $contenu; ?>
        <div class="row alert bg-info">
        <a href="competence.php" class="text-white"><button type="button" style="margin-right: 58px;margin-top: 11px;" class="btn btn-secondary ml-45 text-white">Ajouter une compétence</button></a>
            <h1 class="text-white">Liste des competences</h1>
        </div>
        <?php echo $contenu1; ?>

        <div class="row alert bg-info">
            <a href="experience.php" class="text-white"><button type="button" style="margin-right: 58px;margin-top: 11px;" class="btn btn-secondary ml-45 text-white">Ajouter un experience</button></a>
            <h1 class="text-white">Liste des experiences</h1>
        </div>
        <?php echo $contenu2; ?>

        <div class="row alert bg-info">
            <a href="loisirs.php" class="text-white"><button type="button" style="margin-right: 58px;margin-top: 11px;" class="btn btn-secondary ml-45 text-white">Ajouter un loisir</button></a>
            <h1 class="text-white">Liste des loisirs</h1>
        </div>
        <?php echo $contenu3; ?>
        <div class="row alert bg-info">
            <a href="realisation.php" class="text-white"><button type="button" style="margin-right: 58px;margin-top: 11px;" class="btn btn-secondary ml-45 text-white">Ajouter une réalisation</button></a>
            <h1 class="text-white ">Liste des realisations</h1>
        </div>
        <?php echo $contenu4; ?>
        





