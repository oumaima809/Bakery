//scriptAprops
//La méthode element.getBoundingClientRect() permet de retourner un objet DOMRect qui représente la taille d'un élément
//et sa position relative par rapport à la zone d'affichage (viewport) du navigateur.

const productContainers = document.querySelector(".conteneur");
const nxtBtn = document.querySelector(".nxt-btn");
const preBtn = document.querySelector(".pre-btn");

let containerDimensions = productContainers.getBoundingClientRect();
let containerWidth = containerDimensions.width;

nxtBtn.addEventListener("click", () => {
  productContainers.scrollLeft += containerWidth;
});

preBtn.addEventListener("click", () => {
  productContainers.scrollLeft -= containerWidth;
});
