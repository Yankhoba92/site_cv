/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

import './main/script.js';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';
const $ = require("jquery");
require("bootstrap");





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
// $(function() {
//     var current_progress = 0;
//     var interval = setInterval(function() {
//         current_progress += 10;
//         $("#dynamic")
//         .css("width", current_progress + "%")
//         .attr("aria-valuenow", current_progress)
//         .text(current_progress + "%");
//         if (current_progress >= 70)
//             clearInterval(interval);
//     }, 1000);
//   });
//   $(function() {
//     var current_progress = 0;
//     var interval = setInterval(function() {
//         current_progress += 10;
//         $("#dynamicCss")
//         .css("width", current_progress + "%")
//         .attr("aria-valuenow", current_progress)
//         .text(current_progress + "%");
//         if (current_progress >= 60)
//             clearInterval(interval);
//     }, 1000);
//   });
//   $(function() {
//     var current_progress = 0;
//     var interval = setInterval(function() {
//         current_progress += 10;
//         $("#dynamicJs")
//         .css("width", current_progress + "%")
//         .attr("aria-valuenow", current_progress)
//         .text(current_progress + "%");
//         if (current_progress >= 40)
//             clearInterval(interval);
//     }, 1000);
//   });
//   $(function() {
//     var current_progress = 0;
//     var interval = setInterval(function() {
//         current_progress += 10;
//         $("#dynamicJq")
//         .css("width", current_progress + "%")
//         .attr("aria-valuenow", current_progress)
//         .text(current_progress + "%");
//         if (current_progress >= 40)
//             clearInterval(interval);
//     }, 1000);
//   });
//   $(function() {
//     var current_progress = 0;
//     var interval = setInterval(function() {
//         current_progress += 10;
//         $("#dynamicPhp")
//         .css("width", current_progress + "%")
//         .attr("aria-valuenow", current_progress)
//         .text(current_progress + "%");
//         if (current_progress >= 40)
//             clearInterval(interval);
//     }, 1000);
//   });
//   $(function() {
//     var current_progress = 0;
//     var interval = setInterval(function() {
//         current_progress += 10;
//         $("#dynamicSymfony")
//         .css("width", current_progress + "%")
//         .attr("aria-valuenow", current_progress)
//         .text(current_progress + "%");
//         if (current_progress >= 40)
//             clearInterval(interval);
//     }, 1000);
//   });
// pour les le bouton retour 
window.addEventListener('scroll', function(e) {

    // window.scrollY nous permet d'avoir la distance entre le haut et le scroll effectué
    console.log(window.scrollY)

    if(window.scrollY > 400) {
        document.getElementById('back-to-top').style.display = 'block';
    } else {
        document.getElementById('back-to-top').style.display = 'none';
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