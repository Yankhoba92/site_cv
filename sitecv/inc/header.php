<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- lien css -->
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <!-- lien fontawesome -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
    <!-- lien googlefont -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet"> -->
    <!-- lien animate css -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> -->
    <!-- lien Aos -->
    <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->
    <!-- lien loading io -->
    <!-- <link rel="stylesheet" type="text/css" href="loading-bar.css"/>
    <link rel="stylesheet" href="assets/css/loading-bar.css">
    <link rel="stylesheet" href="assets/css/loading-bar.min.css"> -->

    <title>Site cv</title>
</head>
<body>
    
    <header id="header">
        <!-- block barre de navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white" id="barre_nav">
        <div class="logo" style="width:50px;"><img src="../assets/img/logo.png" style="width:100%;"alt=""></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse"style="justify-content: flex-end;" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <?php
                        
                    ?>
                    <?php 
                    if(estConnecte()){

                        echo    '<li class="nav-item">
                                    <a class="nav-link btn" href="'. RACINE_SITE .'connexion.php/?action=deconnexion" onclick="return confirm(\'Etes-vous certain de vouloir vous déconnecter ? \');">Déconnexion</a>
                                </li>';  
                        
                        // header('location:admin.php');
                        //         exit;
                    
                    }else{
                        
                    };
                    
                    ?>
                    
                </ul>
            </div>
        </nav>        
        
    </header>
    <main>
        
        <div class="container"><!-- div container-->