<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="site cv, portfolio">
    <meta name="author" content="Yankhoba bagayoko">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- lien css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- lien googlefont -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <!-- lien animate css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- lien Aos -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- lien loading io -->
    <!-- <link rel="stylesheet" type="text/css" href="loading-bar.css"/>
    <link rel="stylesheet" href="assets/css/loading-bar.css">
    <link rel="stylesheet" href="assets/css/loading-bar.min.css"> -->
<?php
    require_once 'inc/init.php';
    require_once 'form.php';  // appel de ma class form.php
    
    $form = new Form($_POST); // recupération de mes paramétres
    $url_bdd = '../'; 
?>
    <title>Site cv</title>

</head>
<body data-spy="scroll" data-target="#barre_nav" data-offset="200"
>
    
    <header id="header">
        <!-- block barre de navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white" id="barre_nav">
            <div class="logo"><img src="assets/img/logo.png" alt=""></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#header">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#competences">Compétences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#realisations">Réalisations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#experiences">Expériences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#formation">Formations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#loisirs">Centres d'intérêts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    
                </ul>
            </div>
        </nav>
        <!-- fin block barre de navigation -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 logo_accueil">
                    <img src="assets/img/img_logo.png" alt="">
                    <h1>Développeur / intégrateur web</h1>
                </div>
                <div class="col-md-3"></div>
            
            </div>        
    </header>
    <main>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="svg_about"><path fill="#04173A" fill-opacity="1" d="M0,32L48,42.7C96,53,192,75,288,90.7C384,107,480,117,576,106.7C672,96,768,64,864,53.3C960,43,1056,53,1152,69.3C1248,85,1344,107,1392,117.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        <div class="container"><!-- div container-->
            <section id="about"><!-- section about-->
                <h2 data-aos="fade-up">A PROPOS</h2>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="aboutPara">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem eveniet molestias amet alias voluptate praesentium enim, vel eaque vero culpa sapiente id dignissimos aperiam rerum exercitationem assumenda? Reprehenderit, nulla blanditiis.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem eveniet molestias amet alias voluptate praesentium enim, vel eaque vero culpa sapiente id dignissimos aperiam rerum exercitationem assumenda? Reprehenderit, nulla blanditiis.</p>
                        </div> 
                       <div class="bouton"><button class="btn1"><a href="assets/img/cv.pdf" download >Télécharger mon cv</button></a></div>
                    </div>
                    <div class="col-md-2"></div>        
                </div>
            </section><!--section about -->
        </div> <!-- fin div container -->    
            <!-- block  competences-->
            <section id="competences"><!-- section competences -->
                <div class="container competences mt-5"><!-- div competences -->
                    <h2 data-aos="fade-up ">Compétences</h2>
                    <div class="row"><!-- div row -->
                        <?php 
                            $query = $pdo->query('SELECT * FROM competences');// Lecture de la base de données
                            while ($competence = $query->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <div class="col-md-6">
                            
                            <h3><?= $competence['competence'] .' '. $competence['niveau']?>%</h3>
                            <div class="progress">
                                <div id="dynamic<?= $competence['id_competence']?>" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="<?= $competence['niveau']?> " aria-valuemin="0" aria-valuemax="100" style="width:<?= $competence['niveau']?>%">
                                
                                <span id="current-progress" value="<?= $competence['niveau']?>"></span>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <?php
                                }
                            ?>
                    </div>  <!-- fin div row --> 
                </div> <!-- fin div competences -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#04173a" fill-opacity="1" d="M0,256L1440,64L1440,320L0,320Z"></path></svg>
            </section><!-- fin section competences -->
            
            <div class="container">
                <section id="realisations"><!-- section realisation -->
                    <div class="realisation">
                        <h2 data-aos="fade-up">Réalisations</h2>
                        <div class="row"><!-- row realisation -->
                            <?php
                                $query = $pdo->query('SELECT * FROM realisations');// Lecture de la base de données
                                while ($realisation = $query->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <div class="col-md-4 "><!-- div col-sm -->
                                <!-- Button trigger modal -->
                                
                                <div class="overlay-image modalle" data-toggle="modal" data-target="#staticBackdrop4<?= $realisation['id_realisation']?>">
                                <div class="image"><img class="img-fluid"  data-aos="fade-up" src="<?= $realisation['photo']?>" alt="text"></div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop4<?= $realisation['id_realisation']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel4" aria-hidden="true"><!-- div modal -->
                                    <div class="modal-dialog "><!-- div modal-dialog -->
                                        <div class="modal-content"><!-- div modal-content -->
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                                <div class="modal-body overlay-image">
                                                <h4 class="modal-title text" id="staticBackdropLabel2"><?= $realisation['titre']?></h4>
                                                <div class="text"><?= $realisation['description']?></div>
                                                <img class="image" src="<?=$realisation['photo']?>" alt="text">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div><!-- fin div modal-content -->
                                    </div><!-- fin div modal-dialog -->
                                </div><!-- fin div modal -->  
                            </div><!-- fin div col-md-4 -->
                            <?php
                                }
                            ?>
                        </div><!-- fin row realisation -->
                    </div><!-- fin div realisation -->
                    
                </section><!-- fin section realisation -->
            </div><!-- fin div container -->
                <section id="experiences"><!--  section experiences -->
                    <div class="container experiences"><!-- div experiences -->
                        <h2 data-aos="fade-up">Expériences</h2>
                        <div class="row"><!-- row experiences -->
                            <?php
                            $query = $pdo->query('SELECT * FROM experiences');// Lecture de la base de données
                            while ($experience = $query->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <div class="col-md-3" data-aos="fade-down-right">
                                <p><?= $experience['date_debut']?>  <?php if(empty($experience ['date_fin'])) {
                                    echo ' ';
                                }else{
                                    echo ' - ' . $experience ['date_fin'];
                                }?></p>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-8" data-aos="fade-down-left">
                                <h3><?= $experience['titre']?></h3>
                                <p><?= $experience['description']?></p>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div><!-- fin div experiences -->
                </section><!-- fin section experiences -->
        <div><!-- div container -->
            <section id="formation"><!--  section experiences -->
                <div class="container fomartions"><!-- div formations -->
                    <h2 data-aos="fade-up">Formations</h2>
                    <div class="row"><!-- row experiences -->
                    <?php
                        $query = $pdo->query('SELECT * FROM formations');// Lecture de la base de données
                        while ($formation = $query->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <div class="col-md-3" data-aos="fade-down-right">
                            <p>
                                <?= $formation['date_debut']?>  <?php if(empty($formation ['date_fin'])) {
                                echo ' ';
                                }else{
                                echo ' - ' . $formation ['date_fin'];
                                }?>
                            </p>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-8" data-aos="fade-down-left">
                            <h3><?= $formation['titre']?></h3>
                            <p><?= $formation['description']?></p>
                        </div>
                        <?php
                        }
                        ?>
                    </div><!-- fin row experiences -->
                </div>
                </section><!-- fin section formations -->
                <section id="loisirs"><!-- section loisirs -->
                    <div class=" container loisirs"><!-- div loisirs-->
                        <h2 data-aos="fade-up">Centres d'intérêts</h2>
                        <div class="row">
                            <?php
                                $query = $pdo->query('SELECT * FROM loisirs');
                                // Lecture de la base de données
                                while ($loisirs = $query->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            
                            <div class="col-md-4">
                            <img src="<?= $loisirs['photo'] ?>" alt="">                            
                                <h3><?= $loisirs['loisir'] ?></h3>
                            </div>
                            
                        
                        <?php
                            }
                        ?>
                        </div>
                    </div><!-- fin div loisirs-->
                </section><!-- fin section loisirs -->
        </div><!-- fin div container-->
        <!--Section: Contact v.2-->
            <section class="mb-4" id="contact"><!--Section heading-->
            <?php
            
                
            ?>
                <div class="container"> <!-- div conainer -->             
                    <form id="contact-form" name="contact-form" action="contact.php" method="POST" data-aos="fade-right">
                        <h2 class="h2-responsive font-weight-bold text-center my-4" data-aos="fade-up">Contact</h2>
                        <!--Section description-->
                        <p class="text-center w-responsive mx-auto mb-5">Avez vous des questions? N'hesitez pas à me contacter</p>    
                        <div class="row"><!-- formulaire fait en orienté objet   -->
                            <div class="col-md-9 mb-md-0 mb-5"><!--Grid column-->
                                <p class="text-center w-responsive mx-auto mb-5"></p>
                                <!--Grid row-->
                                <p id="resultat"></p>
                                <div class="row">
                                    <!--Grid column-->
                                    <div class="col-md-6" >
                                        <?= $form->input('name');?>
                                    </div>
                                    <div class="col-md-6">
                                        <?= $form->mail('email');?>
                                    </div>
                                </div><!-- fin div row --> 
                                    <!--Grid row-->
                                <div class="row">
                                    <div class="col-md-12">
                                    <?= $form->sujet('subject');?>
                                    </div>
                                </div>
                                    <!--Grid row-->
                                    <!--Grid row-->
                                <div class="row">
                                    <!--Grid column-->
                                    <div class="col-md-12">
                                    <?= $form->text('message');?>
                                    </div>
                                </div>
                                    <!--Grid row-->
                                <?= $form->submit();?>
                            </div>
                            <div class="col-md-3 text-center asside" data-aos="fade-left">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <i class="fas fa-map-marker-alt fa-2x"></i>
                                        <p>Colombes</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-phone mt-4 fa-2x"></i>
                                        <p>O7 64 17 21 56</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-envelope mt-4 fa-2x"></i>
                                        <p>bagayoko.yan@gmail.com</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>

                </div>
                
                        
                            <!--Grid column-->
                    </div>
                <!-- </div>div container  -->
                
                <h2 data-aos="fade-up"><i class="fas fa-map-marker-alt"></i>Colombes</h2>
                <div class="maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2621.0347634563086!2d2.26422811518721!3d48.93377967929502!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e665e15629b457%3A0xb73537e2d64e64bb!2s112%20Avenue%20de%20Stalingrad%2C%2092700%20Colombes!5e0!3m2!1sfr!2sfr!4v1606384154425!5m2!1sfr!2sfr" width="100" height="500" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </section><!-- fin Section: Contact-->
            
    </main>
    
    <footer>
        
        
        <div class="mentions">
            <div class="social">
            <a href="https://github.com/Yankhoba92" target="_blank"><i class="fab fa-github"></i></a>
            <a href="https://linkedin.com/in/yankhoba-bagayoko/?originalSubdomain=fr" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href="https://twitter.com/BagayokoYankho1" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com/bakha_lofficiel/" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
            <p>© 20 Portfolio|Tous droits reservés| Designed by Yankhoba Bagayoko|<a href="mentions.php">Mentions légals</a></p>
        </div>
        

    </footer>

    <a id="back-to-top" href="#top"><i class="fas fa-angle-double-up"></i></a>

    <!-- script bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<!-- script jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- script js -->
    <script src="assets/main/script.js"></script>
    <!-- script fontawesome -->
    <script src="https://kit.fontawesome.com/04fd12fbfd.js" crossorigin="anonymous"></script> 
    <!-- script Aos -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="assets/main/aos.js"></script>
    <!-- script loading -->
    <!-- <script src="loading-bar.js"></script>
    <script src="assets/main/loading.js"></script>
    <script src="assets/main/loading-bar.js"></script> -->



</body>
</html>