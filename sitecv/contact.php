<?php
/*---------------------------------------------------------------*/
$retour = ''; 

if(!empty($_POST)){ // si le formulaire a été envoyé et $_POST n'est pas vide
    // On contrôle tous les champs du formulaire :
        
         if(!isset($_POST['name']) || strlen($_POST['name']) < 2) {
           //si le champ "marque" n'existe pas ou que sa longeur est inférieur à 2 ou superieur à 20 (selon la BDD), alors on met un message à l'internaute       
           $retour .= '<div class="alert alert-danger">La nom doit contenir minimum 2  caractères.</div>';
         }
          if(!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            //si le champ "tarif" n'existe pas ou n'est pas un entier ou que sa longeur est  superieur à 5 (selon la BDD), alors on met un message à l'internaute       
            $retour .= '<div class="alert alert-danger">l\'email n\'est pas valide</div>';
        }
        if(!isset($_POST['subject']) || strlen($_POST['subject']) < 4) {
            //si le champ "marque" n'existe pas ou que sa longeur est inférieur à 2 ou superieur à 20 (selon la BDD), alors on met un message à l'internaute       
            $retour .= '<div class="alert alert-danger">Le champ sujet est obligatoire.</div>';
          }
        if(!isset($_POST['message']) || strlen($_POST['message']) < 10) {
            //si le champ "marque" n'existe pas ou que sa longeur est inférieur à 2 ou superieur à 20 (selon la BDD), alors on met un message à l'internaute       
            $retour .= '<div class="alert alert-danger">Le champ message est obligatoire !!.</div>';
        
        }
    }else{
            $retour.= '<div class="alert alert-success">Merci pour votre message</div>';
    }
            
            
            // vérification du formulaire plus envoie de mail
            $mail_destinataire="bagayoko.yan@gmail.com";

            if(!empty($_POST)){ // si le formulaire a été envoyé et $_POST n'est pas vide
                // On contrôle tous les champs du formulaire :
                //-------------
                if(empty($retour)){// 

                  $mail = $_POST['email'];
                  $sujet = $_POST['subject'];
                  $text = str_replace("\n.", "\n..", $_POST['message']);
                  $message = "Nom : ". $_POST['name']."\n";
                  $message .= "Message : ".$text;
                  $headers =array(
                    'From' => $mail,
                    'Reply-To' => $mail​
                  );
                  $success=mail($mail_destinataire,$sujet,$message,$headers);
                  if ($success){
                    $retour .='<div class="alert alert-success">Votre mail est envoyé</a></div>';
                   }else{
                    $retour .='<div class="alert alert-danger">Echec de l\'envoi !</div>';
                  }
   
                }// fin de if (empty($retour))​
            }  echo $retour; 
/*---------------------------------------------------------------*/?>
  