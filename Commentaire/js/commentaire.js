const contenuDiv = document.getElementById("Contenu-descrip");
let erreurComment = document.getElementById("erreur-commentaire");
let commentaire = document.getElementById("message");
// Tableau de contenus
const contenus = [
  "Nous sommes toujours à la recherche de moyens pour améliorer notre service et nos produits. Votre opinion est essentielle pour nous aider à atteindre cet objectif ",
  " En écrivant un commentaire, vous aidez également les autres clients à prendre des décisions éclairées en choisissant nos produits. Nous apprécions énormément vos commentaires",
  "Que vous ayez aimé notre sélection de sucres ou que vous ayez des suggestions pour améliorer notre offre, nous aimerions entendre ce que vous avez à dire",
  "  Nous prenons très au sérieux les commentaires de nos clients et sommes toujours prêts à les écouter pour améliorer nos produits et services. N'hésitez pas à nous faire part de vos commentaires à tout moment ",
];

// Index initial
let index = 0;

// Changement de contenu toutes les 3 secondes
setInterval(() => {
  if (index > contenus.length - 1) {
    index = 0;
    contenuDiv.innerHTML = contenus[index];
  }
  contenuDiv.innerHTML = contenus[index];
  index = index + 1;
}, 3000);
document.getElementById("message").addEventListener("change", function () {
  if (commentaire.value.length < 8) {
    erreurComment.innerHTML =
      "Le commentaire doit contenir au moins 8 caractères";
  } else {
    erreurComment.innerHTML = "";
  }
});
document
  .getElementById("commentaire-form")
  .addEventListener("submit", function (event) {
    if (commentaire.value.length < 8) {
      event.preventDefault();
      erreurComment.innerHTML =
        "Le commentaire doit contenir au moins 8 caractères";
    } else {
      erreurComment.innerHTML = "";
    }
  });
