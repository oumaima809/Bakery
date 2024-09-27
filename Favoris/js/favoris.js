const suppresionLiens = document.querySelectorAll(".suppression");
var nbArticle = document.querySelector(".entier");
const nombreArticles = document.querySelectorAll(".article-favoris").length;
nbArticle.textContent = nombreArticles;

// Boucle à travers chaque lien "Supprimer" et ajouter un événement "click"
suppresionLiens.forEach((link) => {
  link.addEventListener("click", function (event) {
    event.preventDefault();
    // Supprimer le parent de parent l'élément actuel qui est le lien
    this.parentNode.parentNode.remove();
    nbArticle.textContent = nbArticle.textContent - 1;
  });
});

// Sélectionnez le bouton
const viderBTN = document.getElementById("vider-liste");

// Ajoutez un écouteur d'événements au bouton pour détecter les clics
viderBTN.addEventListener("click", function () {
  // Sélectionnez tous les éléments avec la classe CSS "article-favoris"
  const elements = document.querySelectorAll(".article-favoris");

  // Parcourez tous les éléments et supprimez-les
  for (let i = 0; i < elements.length; i++) {
    elements[i].remove();
  }
  nbArticle.textContent = 0;
});
