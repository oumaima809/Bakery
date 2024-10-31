<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="stylesheet" href="Css/styleAccueil.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap"
      rel="stylesheet"
    />
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

   <!---------------------------- Include the Navbar---------------------------------->
    <?php include '../Navbar/navbar.php'; ?> 

    
  <!-----------------------------Caroussel-------------------------------------------->
    <div id="caroussel">
      <div class="div-background" id="img-container">
        <img
          id="carousel-img"
          class="first-img"
          src="images/ImageIndex.jpg"
          alt=""
        />
        <h2 class="first-title">
          Découvrez l'univers sucré de notre pâtisserie artisanale
        </h2>
        <p class="first-parag">Un Voyage De Saveurs</p>
        <p class="first-link">
          <a href="#nos-categories">Decouvrir nos pâtisseries</a>
        </p>
      </div>

      <button class="fleche-droite" id="d">
        <i class="fa fa-angle-right"></i>
      </button>
      <button class="fleche-gauche" id="g">
        <i class="fa fa-angle-left"></i>
      </button>
    </div>

    <div class="conteneur-line">
      <hr class="line" />
      <div class="diamond"></div>
      <hr class="line" />
    </div>
    <!-- -------------------------------------------------------------------- -->
    <div class="sucre">
      <div>
        <h3>Nos Sucrés</h3>
        <p class="descrip-sucre">
          Le cœur du savoir-faire de Gourmandise : une gamme de pâtisseries
          sucrées composée de macarons cupcakes et croissant, de délicieux
          entremets. Nos sucrés sont de véritables délices pour les papilles
          gustatives. Chaque bouchée vous transporte dans un monde de saveurs et
          de textures qui vous feront fondre de plaisir. Nos sucrés sont
          moelleux et légers, garnis de crème onctueuse et de fruits frais. Nos
          cupcakes sont tout aussi délicieux, avec une variété de garnitures
          croquantes pour satisfaire toutes les envies. Nos macarons sont
          croustillants à l'extérieur, tendres et fondants à l'intérieur
          ,généreuses pour une touche de gourmandise.
        </p>
        <img
          class="img-general-macarons"
          src="images/macaronsFram.jpg"
          alt=""
        />
      </div>
    </div>

 
    


    <div class="chocolat">
      <div>
        <h3>Nos Chocolats</h3>
        <p class="descrip-choco">
          notre chocolat est de qualité supérieure, élaboré à partir des
          meilleures fèves de cacao et sans additifs artificiels. Savourez une
          expérience gustative unique avec chaque bouchée. Venez découvrir notre
          gamme de produits artisanaux de haute qualité.notre chocolat est de
          qualité supérieure, élaboré à partir des meilleures fèves de cacao et
          sans additifs artificiels. Savourez une expérience gustative unique
          avec chaque bouchée. Venez découvrir notre gamme de produits
          artisanaux !
        </p>

        <img
          class="img-general-chocolats"
          src="images/chocolatGen.jpg"
          alt=""
        />
      </div>
    </div>
    <div class="conteneur-line2">
      <hr class="line" />
      <div class="diamond"></div>
      <hr class="line" />
    </div>

    <a href="#compte"
      ><button class="scroll"><i class="fa fa-angle-double-up"></i></button
    ></a>

    <div class="social-div">
      <div class="Facebook">
        <a
          href="https://www.facebook.com/groups/292204118759292/"
          target="_blank"
          ><i class="fab fa-facebook fb"></i
        ></a>
      </div>
      <div class="Instagram">
        <a href=""
          ><a href="https://www.instagram.com/world.of.bakery/" target="_blank"
            ><i class="fab fa-instagram ins"></i></a
        ></a>
      </div>
      <div class="Twitter">
        <img src="" alt="" /><a
          href="https://twitter.com/search?q=backery%20world&src=typed_query"
          target="_blank"
          ><i class="fab fa-twitter twit"></i
        ></a>
      </div>
      <div class="Pinterest">
        <img src="" alt="" /><a
          href="https://www.pinterest.fr/search/pins/?q=backery%20world&rs=typed"
          ><i class="fab fa-pinterest pint" target="_blank"></i
        ></a>
      </div>
    </div>


 


    <?php
    $host = 'localhost';
    $dbname = 'bakery';
    $username = 'root';
    $password = '';
    


    try {
    
      
      error_reporting(E_ERROR | E_PARSE);
    ini_set('display_errors', 0);
        // Création de l'instance PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
        // Configurer le mode d'erreur PDO sur Exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Autres configurations souhaitées
        // ...
    
        // Utiliser $pdo pour interagir avec la base de données
        // ...
    
    } catch (PDOException $e) {
        // Gérer les erreurs de connexion
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
    ?>
    
    <h2 class="titre-categorie">Nos catégories</h2>

    <div class="div-types-global" id="nos-categories">


<?php

try {
  $query = "SELECT * FROM categorie";
  $stmt = $pdo->query($query);
  $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Parcourir les articles et les afficher
  foreach ($categories as $categorie) {
      echo '
        <div class="div-type">
            <img class="type-img" src="' . $categorie['imgCat'] . '" alt="" />
            <div class="descrip-type">
              <p class="description-gen">La meilleure pâtisserie</p>
              <h3>Nos ' . $categorie['nomCat'] . 's</h3>
              <p class="desc-parag">' . $categorie['descripCat'] . '</p>
              <a href="../Categorie/categorieDetail.php?nom=' . strtolower($categorie['nomCat']) . '">Découvrir</a>
            </div>
        </div>';
  }
} catch (Exception $e) {
  echo 'Error: ' . $e->getMessage();
}

?>





  



  </div>

    <h2 class="titre-best-seller">Nos best seller</h2>

    <div class="best-seller-section">
      <div class="div-best-seller">
      
      <?php 
         
         try {
            $query = "SELECT * FROM article where bestSeller=1";
            $stmt = $pdo->query($query);
            $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($articles as $best) {
              echo '
                   
                  <div class="div-best">
                    <img class="best-img" src="../Categorie/'.$best['imgArt'].'" alt=""/>
                    <div>
                      <h4>'.$best['nomArt'].'</h4>
                      <a href="../Articles/articleDetail.php?nom='.$best['idArt'].'">Découvrir</a>
                    </div>
                </div>
              
              
              ';


            }
          } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
          }

         
      
      
      
      ?>

      </div>
      <div class="btn-div">
        <button class="pre-btn">
          <i class="fas fa-arrow-left"></i>
        </button>
        <button class="nxt-btn">
          <i class="fas fa-arrow-right"></i>
        </button>
      </div>
    </div>

    <!---------------------------- Opinions ------------------------->

    <div class="div-opinion">
      <img src="images/opinion.jpg" alt="" />
      <div class="opinion">
        <h3>Ce que vous pensez de Bakery World</h3>
        <p class="type-avis">Avis concernant Cupcake</p>
        <p class="nom-client">Trabelsi Jihen</p>
        <p class="commentaire">
          J'adore les cupcakes ! Ils sont délicieux, amusants à manger et
          parfaits pour toutes les occasions.
        </p>
        <!-- displays a 2x solid circle icon -->

        <i id="first-btn" class="far fa-circle"></i>
        <i id="second-btn" class="far fa-circle"></i>
        <i id="third-btn" class="far fa-circle"></i>
      </div>
    </div>
    <div class="div-valeurs">
      <div class="valeur">
        <i class="fas fa-truck icon-valeur"></i>
        <div class="descrip">
          <h4>Livraison à domicile</h4>
          <p>Gratuite sur toute la Tunisie</p>
        </div>
      </div>
      <div class="valeur">
        <i class="fa-solid fa-lock icon-valeur"></i>
        <div class="descrip">
          <h4>Paiement sécurisé</h4>
          <p>Carte bancaire ou paiement à la livraison</p>
        </div>
      </div>
      <div class="valeur">
        <i class="fa-solid fa-trophy icon-valeur"></i>
        <div class="descrip">
          <h4>Certification</h4>
          <p>Conforme aux normes internationales</p>
        </div>
      </div>
    </div>



    <?php include '../Footer/footer.php'; ?> 
    <script src="js/accueil.js"></script>


  </body>
</html>
