<?php

require_once '../inc/init.php';
require_once '../inc/header.php';
//---------------------Traitement PHP------------------

// Traitement des données du formulaire :
 if(!empty($_POST)){ // si le formulaire a été evoyé

        // On controle tous les champs du formulaire :
        if(!isset($_POST['pseudo']) || strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) >  20){
            // si le champ "pseudo" n'existe pas ou que sa longeur est inférieur 4 ou sup2rieur à 20 (selon la BDD) alors on met un message à l'internaute
            $contenu .= '<div class="alert alert-danger">Le pseudo doit contenir entre 4 et 20 caractéres.</div>';
        }
        if(!isset($_POST['mdp']) || strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) >  20){
            // si le champ "MDP" n'existe pas ou que sa longeur est inférieur 4 ou sup2rieur à 20 (selon la BDD) alors on met un message à l'internaute
            $contenu .= '<div class="alert alert-danger">Le mot de passe doit contenir entre 4 et 20 caractéres.</div>';
        }
        //-----------------
        // s'il n'y a pas d'ereur sur le formulaire on vérifie que le pseudo est dispinible puis on insére le mlembre en BDD :
        if(empty($contenu)) { // Si est vide notre variable, c'est qu'il n y a pas de message d'erreur 
            // On vérifie que le pseudo est disponible :
            $resultat = executeRequete("SELECT * FROM admin WHERE pseudo = :pseudo", array( ':pseudo'=>$_POST['pseudo']));

            if($resultat->rowCount() > 0){ // s'il y a une ou plusieurs ligne dans l'objet $resutat c'est que le pseudo est déjà en BDD.
                $contenu .= '<div class="alert alert-danger">Le pseudo n\'est pas disponible. Veuillez choisir un autre.</div>';
            }else {
                // Le pseudo est disponible on insére le mebre en BDD :
               $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);  // cette foncytion retoiurne la clé de hachage de notre mot de passe selon l'algorithme "brrypt" par défaut. il faudra sur la page de connexion comparer le hash de la BDD avec celui du mdp fourni lors de la connexion avec la fonction password_verify().
                // debug($mdp);
                $succes = executeRequete("INSERT INTO admin(pseudo, mdp) VALUES (:pseudo, :mdp)",
                array(
                    ':pseudo' => $_POST['pseudo'],
                    ':mdp' => $mdp, // on prend le mdp hashé

                ));
                if($succes) {
                    $contenu .= '<div class ="alert alert-success"> Vous étes inscrit. Pour vous connecter <a href ="../connexion.php">cliquez ici.</a></div>';
                } else {
                    $contenu .='<div class ="alert alert-danger"> Une erreur est survenue...</div>';
                }
            }
        } // fin de if(empty($contenu)) 
 } // fin de if(!empty($_POST))

//-----------Affichage------------------
?>
        <div class="row alert bg-info">
            <h1 class ="text-white"> Inscription </h1>
        </div>
        <?php echo $contenu;?>
        <form action="" method="post">
            <div><label for="pseudo">Pseudo</label></div>
            <div><input type="text" name="pseudo" id="pseudo"></div>

            <div><label for="mdp">Mot de passe</label></div>
            <div><input type="password" name="mdp" id="mdp"></div>

            <div><input type="submit" value="s'inscrire" class="btn btn-info mt-4"></div>
        </form>
    </div>