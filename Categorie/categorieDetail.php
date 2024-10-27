<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Bakery Chocolat</title>

    <link rel="stylesheet" href="../Navbar/navbar.css" />
    <link rel="stylesheet" href="../Footer/footer.css" />

    <link rel="stylesheet" type="text/css" href="Css/styleCategorieArticle.css" />
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
  </head>

  <body>
  <?php include '../Navbar/navbar.php'; ?> <!-- Include the navbar -->

    <!-- partie a gauche de filtre jusqua prix -->
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />

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



    <div id="container">
      <div class="tout">
        <div>
          <aside class="filtre">
            <!-- la partie droite-->
            <h4>Filtre</h4>
            <br />
            <p>6 produits</p>
            <br />
            <hr />
            <br />
          </aside>
        </div>
        <div>
          <aside class="dispo">
            <h4>Disponibilité</h4>
            <br />

            <form class="check">
              <input
                type="checkbox"
                name="produit"
                value="En stock"
                class="disponibilité"
              />
              <span>stock</span> <br />
              <br />

              <input
                type="checkbox"
                name="produit"
                value="En rupture de stock"
                class="disponibilité"
              />
              <span>En rupture de stock </span>
            </form>
            <br />
            <hr />
          </aside>
        </div>
      </div>
      <?php 
if (isset($_GET['nom'])) {
    // Get the value of 'nom' from the URL
    $nomCat = $_GET['nom'];
   

    if ($nomCat == "chocolat") {
        $idCat=2;
        echo '
        <!-- Image background -->
        <div class="first">
          <div class="centre">
            <!-- au centre et avec bordrer -->
            <img src="images/chocolatBackground.jpg" class="img-general" />
            <div class="pub">
              <h1>Nos chocolats</h1>
              <br />
              <p>
                "Venez découvrir la divine tentation chocolatée de notre
                pâtisserie artisanale, pour une expérience de plaisir sucré
                inoubliable !"
              </p>
            </div>
          </div>
        </div>
        <hr />';
    } 
    else if ($nomCat == "croissant") {
        $idCat=1;

        echo '
        <!-- Image background -->
        <div class="first">
          <div class="centre">
            <!-- au centre et avec bordrer -->
            <img src="images/croissBG.jpg" class="img-general" />
            <div class="pub">
              <h1>Nos croissants</h1>
              <br />
              <p>
                "Venez savourer notre croissant artisanal,
                préparé avec amour et expertise chaque matin.
                Un régal pour les papilles qui vous transportera immédiatement
                en France !"
              </p>
            </div>
          </div>
        </div>
        <hr />';
    }
    else if($nomCat=="cupcake"){
        $idCat=4;

        echo'<!-- Image backround-->
      <div class="first">
        <div class="centre">
          <!-- au centre et avec bordrer-->
          <img src="images/bgCupcake2.jpg" class="img-general" />

          <div class="pub">
            <h1>Nos Cupcakes</h1>
            <br />

            <p>
              Venez fêter vos événements avec nos cupcakes colorés et
              ludiques,<br />
              pour des souvenirs inoubliables !
            </p>
          </div>
        </div> 
        <hr />';
    }
    else if($nomCat=="macaron"){
        $idCat=3;

        echo '<!-- Image backround-->
      <div class="first">
        <div class="centre">
          <!-- au centre et avec bordrer-->
          <img src="images/bgMacarons.jpg" class="img-general" />

          <div class="pub">
            <h1>Nos macarons</h1>
            <br />

            <p>
              "Un petit plaisir sucré à emporter partout avec vous -
              <br />savourez nos macarons faits à la main pour une expérience
              gustative inoubliable!"
            </p>
          </div>
        </div>
        <hr />';
    }
} 
?>



        <!--le tri  et avec border aussi-->
        <div class="tr">
          <p>Triez par :</p>
          <br />
          <form method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">
               
                   

                <select name="Trie" id="trie-prix" onchange="this.form.submit()">
                    <option value="aucun">aucun</option>
                    <option value="low-high" <?php if (isset($_GET['Trie']) && $_GET['Trie'] == 'low-high') echo 'selected'; ?>>Prix: faible à élevé</option>
                    <option value="high-low" <?php if (isset($_GET['Trie']) && $_GET['Trie'] == 'high-low') echo 'selected'; ?>>Prix: élevé à faible</option>
                </select>
                <input type="hidden" name="nom" value="<?php echo $nomCat; ?>"/>  
          </form>


    

          <br />
        </div>

        <br />
        <br />
        <br />

        <!--nav et modification des images-->
        <div class="notif" id="notification"></div>
        <div id="article-conteneur">



        <?php
session_start();
$_SESSION['nom_utilisateur'] = 'John';
?>




        <?php
// ...



try {

   
    $tri = $_GET['Trie'];
    $currentOption = $tri;
    // Modifiez votre requête SQL en fonction de la valeur de tri
    if ($tri === 'low-high') {
        $query = "SELECT * FROM article WHERE catArt = $idCat ORDER BY prixArt ASC";
    } elseif ($tri === 'high-low') {
        $query = "SELECT * FROM article WHERE catArt = $idCat ORDER BY prixArt DESC";
    } else {
        $query = "SELECT * FROM article WHERE catArt = $idCat";
    }
    
    $stmt = $pdo->query($query);
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Parcourir les articles et les afficher
    foreach ($articles as $article) {









      echo '<div class="article">';
      echo '<img src='."\"".$article['imgArt']."\"".' class="image" />';

    echo ' <div class="product-btn">
        <button id="product-BTN">
          <i class="fas fa-heart button-heart"></i>
        </button>
        <button id="product-BTN">
          <i class="fas fa-shopping-cart"></i>
        </button>
        <button id="product-BTN">
          <i class="fa fa-eye"></i>
        </button>
      </div>

      <div>
      <a href="../Articles/articleDetail.php?nom=' . $article['idArt'] . '"><h4>' . $article['nomArt'] . '</h4></a>
        <p class="description-article">' .$article['designArt'].
        '</p>
        <p class=""price"">'.$article['prixArt'].'</p>
        <br />
      </div>
    </div>';






    }

   



} catch (PDOException $e) {
   
}
?>

        </div>
        <hr />
      </div>
    </div>
    <br />
    <br />
    <br />
    <!-- Partie footer -->

    <?php include '../Footer/footer.php'; ?> 
    
    <script src="js/heart.js"></script>
    <script src="js/aperçu.js"></script>
  </body>
</html>
