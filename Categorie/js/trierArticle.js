const articles = document.getElementById("article-conteneur");

// Récupérer le menu déroulant
const select = document.getElementById("trie-prix");

// Fonction pour trier les articles
function trierArticles() {
  const option = select.value;
  const sortedArticles = Array.from(articles.children).sort((a, b) => {
    const prixA = parseInt(a.querySelector(".price").textContent);
    const prixB = parseInt(b.querySelector(".price").textContent);
    if (option === "Prix: faible à élevé") {
      return prixA - prixB;
    } else if (option === "Prix: élevé à faible") {
      return prixB - prixA;
    }
  });
  articles.innerHTML = "";
  sortedArticles.forEach((article) => articles.appendChild(article));
}

// Écouter les événements de changement sur le menu déroulant
select.addEventListener("change", trierArticles);
