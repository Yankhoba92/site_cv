// barre de nav scroll
var myNav = document.getElementById('barre_nav');

window.onscroll = function ()  {
    "use strict";
    if(window.scrollY > 200){
       myNav.classList.add("anim-nav");
    //    console.log("hoo");
    }else{
        myNav.classList.remove("anim-nav");    
    }
};
// progress barre

//   $(function() {
//     var current_progress = 0;
//     var interval = setInterval(function() {
//         current_progress += 10;
//         $(".progress-bar")
//         .css("width", current_progress + "%")
//         .attr("aria-valuenow", current_progress)
//         .text(current_progress + "%");
//         if (current_progress >= 80)
//             clearInterval(interval);
//     }, 100);
//   });
  
   
// pour les le bouton retour 
window.addEventListener('scroll', function(e) {

    // window.scrollY nous permet d'avoir la distance entre le haut et le scroll effectué
    // console.log(window.scrollY)

    if(window.scrollY > 400) {
        document.getElementById('back-to-top').style.display = 'block';
    } else {
        document.getElementById('back-to-top').style.display = 'none';
    }
});
window.addEventListener('scroll', function(e) {

    // window.scrollY nous permet d'avoir la distance entre le haut et le scroll effectué
    console.log(window.scrollY)

    if (window.scrollY >= 924 && window.scrollY <= 1484)  {
        document.getElementById('back-to-top').style.color = 'rgba(223, 223, 223, 0.747)';
        document.getElementById('back-to-top').style.background ='rgb(4, 23, 58)' ;
     }else if(window.scrollY >= 2700 && window.scrollY <= 3138) {
        document.getElementById('back-to-top').style.color = 'rgba(223, 223, 223, 0.747)';
        document.getElementById('back-to-top').style.background ='rgb(4, 23, 58)' ;    
     }else if(window.scrollY >= 3990 && window.scrollY <= 4365) {
        document.getElementById('back-to-top').style.color = 'rgba(223, 223, 223, 0.747)';
        document.getElementById('back-to-top').style.background ='rgb(4, 23, 58)' ;  
    }else if(window.scrollY >= 5256 && window.scrollY <= 5960) {
        document.getElementById('back-to-top').style.color = 'rgba(223, 223, 223, 0.747)';
        document.getElementById('back-to-top').style.background ='rgb(4, 23, 58)' ;  
     }else{
        document.getElementById('back-to-top').style.color = 'rgb(4, 23, 58)';
        document.getElementById('back-to-top').style.background = 'rgba(223, 223, 223, 0.747)';
     }
});

// document.getElementById('back-to-top').addEventListener('click', function(e) {
//     e.preventDefault();
//     window.scrollTo({top: 0, behavior: 'smooth'});
// });

// Pour les encres
$('#header .navbar-nav a').on('click', function(e) {
    e.preventDefault();
    var anchor = $(this);              
    window.scrollTo({top: $(anchor.attr('href')).offset().top - 120, behavior: 'smooth'});
    
    });

// Ajax
$("form").submit(function(e){
    e.preventDefault(); //empêcher une action par défaut
    let email = $(this).serialize(); //$(this) se référe au formulaire que l'on a soumis et la méthode serialize() en récupére les données sous forme de string selon la syntaxe suivante  : "email=toto@gmail.com" ou email correspond au "name" de l'input.
                console.log(email);

                // 3-déclaration de la fonction de traitement de la réponse :
                function reponse (reponsePHP){
                    console.log(reponsePHP); // on voit la réponse du serveur
                    if(reponsePHP){
                        $('#resultat').html(reponsePHP); // si reponsePHP existe, on l'affiche dans le <p>.

                    }
                }

                function erreur() {
                    $('#resultat').html('Une erreur est survenue.')
                }

    $.ajax({
        url  : 'contact.php', // URL de destination des données de la requête
        type : 'POST', // méthode GET ou POST 
        data : email, // les données envoyé sous formes d'objet { prop : 'valeur'} ou de string "prop=valeur"
        dataType : 'html',  // tyoe des données retournées par le serveur (html, json, xml ou text)
        success  : reponse, // callback qui se déclenche en cas de succès de la requéte
        error    : erreur   // callback qui se déclenche en cas d'erreur de la requête
     });
  });

// $("button").click(function(){
//     /*Transforme les données du formulaire en chaine de requête de la forme
//     prenom=pierre&mail=pierre.giraud%40edhec.com*/
//     let chaine = $("form").serialize();

//     console.log(chaine);
// });