<?php
require_once 'inc/init.php';
require_once 'inc/header.php';

$message = ''; // Pour afficher le message de déconnexion



// 2- déconnexion du admin
// debug($_GET);
// Déconnexion Admin :

// if(estAdmin()){
//     if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){// si "action" est dans l'url et qu'il a pour valeur "déconnexion", c'est que le admin a cliqué sur "Deconnexion".
        
//         unset($_SESSION['admin']);// On vide la session de sa partie "admin" tout en conservant l'événement partie "panier".
        
//         $message .= '<div class="alert alert-info">Vous avez bien été déconnecté, à bientot !</div>';
//     }
// }
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion') { 
    unset($_SESSION['admin']); 
    $message .= '<div class="alert alert-info"> Vous étes déconnecté.</div>';

    header ('location: ../connexion.php');
    exit;
}



    if(!empty($_POST)){ // si le formulaire a été envoyé

        // contrôles du formulaire
        if(empty($_POST['pseudo']) ||empty($_POST['mdp'])) { // si le pseudo ou le mdp est vide
            $contenu .= '<div class = "alert alert-danger">Les identifiants sont obligatoires.</div>';

        }

            if(empty($contenu)) { // si la variable est vide, c'est qu'il n y a pas de message d'erreur 
            $resultat =executeRequete("SELECT * FROM admin WHERE pseudo = :pseudo", array(':pseudo' => $_POST['pseudo']));

            if($resultat->rowCount() ==1){ // s'il y a une ligne de résultat c'est que le pseudo est en BDD :on peut alors vérifier le mdp
                // debug($resultat);

                $admin = $resultat -> fetch(PDO::FETCH_ASSOC);// on "fetch" l'objet $resultat pour en extraire les données, sans boucle car le pseudo est unique en BDD.
                // var_dump($admin);

                if(password_verify($_POST['mdp'], $admin['mdp'])){ 
                    $_SESSION['admin'] = $admin;

                   header( 'location:' . RACINE_SITE .'admin/admin.php');
                   exit; 

                }else{
                    $contenu = '<div class="alert alert-danger">Erreur sur les identifiants.</div>';
                    
                }

            } else {
                $contenu .= '<div class="alert alert-danger"> Erreur sur les identifiants.</div>';
            }

            }

            

    } // fin du if (!empty($_POST))



//------------------AFFICHAGE---------


?>
<h1 class ="mt-4">Connexion</h1>

<?php
echo $message; // pour afficher le message de déconnexion
echo $contenu; // pour afficher les autres 
?>
<form action="" method="post">

    <div><label for="pseudo">Pseudo</label></div>
    <div><input type="text" name="pseudo" id="pseudo"></div>

    <div><label for="mdp">Mot de passe</label></div>
    <div><input type="password" name="mdp" id="mdp"></div>

    <div><input type="submit" value="Se connecter" class="btn btn-info mt-4"></div>


</form>



