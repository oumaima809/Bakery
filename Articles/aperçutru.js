const notif = document.querySelector(".notif");
const body = document.querySelector("body");
const overlay = document.querySelector("#overlay");
// Récupération de tous les boutons avec la classe "product-btn"
const productBtns = document.querySelectorAll(".fa-eye");

// Parcourir tous les boutons et ajouter un gestionnaire d'événements
productBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    overlay.style.display = "block";
    const articleTitle = document.createElement("h4");

    const titre = document.createElement("h3");
    const hrElement = document.createElement("hr");
    titre.innerText = "Aperçu";

    // Récupération de l'élément parent "article"
    const article = btn.closest(".product_card");
    const list = document.createElement("ol");
    const articleImg = article.querySelector("img");
    const articleTitleText = article.querySelector(".product_name").innerText;

    articleTitle.innerText = articleTitleText;

    // Création des éléments de la liste
    const listItem1 = document.createElement("li");
    listItem1.innerText = "Délicieux";
    const listItem2 = document.createElement("li");
    listItem2.innerText = "Gourmand";
    const listItem3 = document.createElement("li");
    listItem3.innerText = "Legère";

    titre.style.backgroundColor = "#c46060";
    titre.style.color = "#fff";
    titre.style.padding = "5px";

    articleTitle.style.position = "relative";
    articleTitle.style.left = "220px";
    articleTitle.style.top = "30px";
    hrElement.style.position = "relative";
    list.style.position = "relative";
    list.style.left = "235px";
    list.style.color = "#8e8e8e";
    list.style.fontSize = "13px";
    list.style.bottom = "90px";

    // Ajout des éléments de la liste à la liste numérotée
    list.appendChild(listItem1);
    list.appendChild(listItem2);
    list.appendChild(listItem3);

    list.addEventListener("mouseover", function () {
      this.style.color = "#c46060";
    });

    list.addEventListener("mouseout", function () {
      this.style.color = "#8e8e8e";
    });

    // Ajout de la liste numérotée à la notification
    // Récupération de l'élément "img" et "p" de l'article
    //const articleImg = article.querySelector(".image");

    // Création de l'élément "p" pour la description

    notif.style.display = "block";

    // Remplir l'élément "div" avec les informations de l'article

    notif.innerHTML = "";

    notif.appendChild(titre);
    notif.appendChild(hrElement);
    notif.appendChild(articleTitle);

    notif.appendChild(articleImg.cloneNode(true));
    notif.appendChild(list);

    // Changement de la visibilité de l'élément "div"
  });
});

notif.addEventListener("click", () => {
  notif.style.display = "none";
  overlay.style.display = "none";
});

//Dans ce code, nous avons créé un nouvel élément "p" pour stocker la description de l'article.
// Nous avons également utilisé la propriété "innerText" pour récupérer le texte de la classe "description-article" et l'ajouter à l'élément "p".
//Ensuite, nous avons ajouté cet élément "p" à la notification avec la méthode "appendChild".
