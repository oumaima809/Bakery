<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Css/styleFavoris.css" />
    <link rel="stylesheet" href="../Navbar/navbar.css" />
    <link rel="stylesheet" href="../Footer/footer.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
      rel="stylesheet"
      href="../fontawesome-free-6.4.0-web/css/all.min.css"
    />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap"
      rel="stylesheet"
    />
    <title>Document</title>
  </head>
  <body>


 <?php include '../Navbar/navbar.php' ?>
  

  <div class="conten-general">
      <div class="titre-favoris">
        <h4>Ma liste de souhait</h4>
        <span class="nb-article"> <span class="entier">0</span> articles</span>
      </div>
      <div class="article-favoris">
        <img class="favoris-img" src="images/chocolat.jpg" alt="" />
        <div class="descrip-favoris">
          <h3>Cupcakes au chocolat</h3>
          <span class="titre-descrip">Poids net :</span>
          <span> 500g</span>
          <br />
          <span class="titre-descrip"> Poids brut: </span>
          <span>670g</span>
        </div>

        <div class="operation-possibles">
          <a href="">Ajouter au panier</a> <br />
          <a class="suppression" href="">Supprimer</a>
        </div>
        <p class="prix">25000 DT</p>
      </div>
      <div class="article-favoris">
        <img class="favoris-img" src="images/articleAchete.jpg" alt="" />
        <div class="descrip-favoris">
          <h3>Cupcakes au noisettes</h3>
          <span class="titre-descrip">Poids net :</span>
          <span> 500g</span>
          <br />
          <span class="titre-descrip"> Poids brut: </span>
          <span>670g</span>
        </div>

        <div class="operation-possibles">
          <a href="">Ajouter au panier</a> <br />
          <a class="suppression" href="">Supprimer</a>
        </div>
        <p class="prix">25000 DT</p>
      </div>

      <div class="article-favoris">
        <img class="favoris-img" src="images/miel.jpg" alt="" />
        <div class="descrip-favoris">
          <h3>Cupcakes au miel</h3>
          <span class="titre-descrip">Poids net :</span>
          <span> 500g</span>
          <br />
          <span class="titre-descrip"> Poids brut: </span>
          <span>670g</span>
        </div>

        <div class="operation-possibles">
          <a href="">Ajouter au panier</a> <br />
          <a class="suppression" href="">Supprimer</a>
        </div>
        <p class="prix">25000 DT</p>
      </div>
    </div>

    <div class="vider-continuer">
      <button class="btn-vider-retour btn1">
        <a href="../Categorie/macarons.html" class="">Continuer mes achats</a>
      </button>

      <button class="btn-vider-retour btn2" id="vider-liste">
        <a href="#">Vider la liste de souhaits</a>
      </button>
    </div>
<?php  include '../Footer/footer.php'?>

    <script src="panier.js"></script>
    <script src="panierSRC.js"></script>
    <script src="js/favoris.js"></script>
  </body>
</html>
