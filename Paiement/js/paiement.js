var chrono = 5 * 60; // durée total en secondes
var timer = setInterval(function () {
  //calcul des minutes restantes
  var minutes = Math.floor(chrono / 60);
  //
  var seconds = chrono % 60;
  document.getElementById("temps-restant").innerHTML =
    minutes + ":" + (seconds < 10 ? "0" : "") + seconds;
  chrono--;
  if (chrono < 0) {
    clearInterval(timer);
    location.reload(); // actualiser la page
  }
}, 1000); // rafraîchir toutes les secondes

let adresse = document.getElementById("adress");
let ville = document.getElementById("ville");
let codeP = document.getElementById("codeP");
let telephone = document.getElementById("telephone");
let numCarte = document.getElementById("num-carte");
let nomTitulaire = document.getElementById("nom-titulaire");
let codeSecurite = document.getElementById("code-securite");

document
  .getElementById("paiement-form")
  .addEventListener("submit", function (e) {
    let expressionAdresse = /^[a-zA-Z\s]*$/;
    let expressionCodeP = /^\d{4}$/;
    let expressionTelephone = /^\d{8}$/;
    let expressionNumCarte = /^\d{16}$/;
    let expressionTitulaire = /^[A-Z\s]+$/;
    let expressionCodeCarte = /^\d{3}$/;

    var cards = document.getElementsByName("cards");
    var isChecked = false;

    for (var i = 0; i < cards.length; i++) {
      if (cards[i].checked) {
        isChecked = true;
        break;
      }
    }

    if (expressionAdresse.test(adresse.value) == false) {
      e.preventDefault();
      document.getElementById("erreur").innerHTML =
        "l'adresse doit comporter des lettres seulement";
    } else if (expressionAdresse.test(ville.value) == false) {
      document.getElementById("erreur").innerHTML =
        "la ville doit comporter des lettres seulement";
      e.preventDefault();
    } else if (expressionCodeP.test(codeP.value) == false) {
      document.getElementById("erreur").innerHTML =
        "le code postal doit être composé de 4 chiffres";
      e.preventDefault();
    } else if (expressionTelephone.test(telephone.value) == false) {
      document.getElementById("erreur").innerHTML =
        "le numero de telephone doit comporter obligatoirement 8 chiffres";
      e.preventDefault();
    } else if (isChecked == false) {
      document.getElementById("erreur").innerHTML =
        "Veuillez indiquer le mode de paiement";
      e.preventDefault();
    } else if (expressionNumCarte.test(numCarte.value) == false) {
      document.getElementById("erreur").innerHTML =
        "le numero de carte doit comporter obligatoirement 16 chiffres";
      e.preventDefault();
    } else if (expressionTitulaire.test(nomTitulaire.value) == false) {
      document.getElementById("erreur").innerHTML =
        "le nom de titulaire doit être obligatoirement en majuscule";
      e.preventDefault();
    } else if (expressionCodeCarte.test(codeSecurite.value) == false) {
      document.getElementById("erreur").innerHTML =
        "le code doit comporter 3 chiffres";
      e.preventDefault();
    } else {
      document.getElementById("erreur").innerHTML = "";
    }
  });
