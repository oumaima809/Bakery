
<?php


    session_start();
    
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Accueil/Css/styleAccueil.css" />
    <link rel="stylesheet" href="Css/stylePanier.css" />
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
    <div id="compte" class="div-compte">
      <span class="first-span">Besoin d'aide ? </span>
      <span class="second-span"> Appeler 72313478</span>
      <a class="inscription" href="inscription.html"
        ><span>Inscription</span></a
      >
      <a class="connexion" href="connexion.html"><span>Connexion</span></a>
    </div>
    <nav>
      <div class="logo">
        <p>Bakery World</p>
      </div>
      <ul>
        <li><a href="index.html">HOME</a></li>
        <li>
          <a href="" class="service">SERVICES</a>
          <ul>
            <li><a href="">Amandes</a></li>
            <li><a href="">Macarons</a></li>
            <li><a href="">Traditions</a></li>
            <li><a href="">Chocolat</a></li>
          </ul>
        </li>
        <li><a href="propos.html">ABOUT</a></li>
        <li>
          <a href=""><i class="fas fa-heart"></i></a>
        </li>
        <li>
          <a href=""><i class="fas fa-shopping-cart"></i> </a>
        </li>
      </ul>
    </nav>
    <?php
$host = 'localhost';
$dbname = 'patisserie';
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
    <div class="conteneur-general">
      <div class="contenu-panier">

      <?php
session_start();
error_reporting(E_ERROR | E_PARSE);

$host = 'localhost';
$dbname = 'patisserie';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $adresseClient = $_SESSION['email'];

    $query = "SELECT a.nomArt, a.designArt, a.imgArt, a.prixArt, p.quantite,p.code_article
              FROM panier p
              INNER JOIN article a ON a.idArt = p.code_article
              WHERE p.adresse_client = :adresseClient";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':adresseClient', $adresseClient);
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total=0;
    // Parcourir les articles et les afficher
    foreach ($articles as $article) {
      $total=$total+$article['prixArt']*$article['quantite'];
        echo '<div class="article">

            <div class="descrip-img">
                <img alt="" src="../Categorie/' . $article['imgArt'] . '"/> 
                <div class="description-article">
                    <h3>' . $article['nomArt'] . '</h3>
                    <span class="titre-descrip">Poids net :</span>
                    <span> 500g</span>
                    <br />
                    <span class="titre-descrip"> Poids brut: </span>
                    <span>670g</span>
                    <p>' . $article['prixArt'] . '</p>
                </div>
            </div>
            <div class="plus-moins">
                <form action="update_quantite.php" method="POST">
                    <button type="submit" class="plus-btn" name="incrementBtn" value="' . $article['code_article'] . '">
                        <i class="fas fa-plus"></i>
                    </button>
                    <input type="text" name="qte" id="nbArticles" value="' . $article['quantite'] . '" />
                    <button class="minus-btn" id="decrementBtn" name="decrementBtn" onclick="Diminuer()">
                        <i class="fas fa-minus"></i>
                    </button>
                    <input  type="hidden" name="codeArticle" id="nbArticles" value="'.$article['code_article'].'  " />

                </form>
            </div>

            <div class="total-article">
                <p class="prix-total">' . $article['prixArt']*$article['quantite']. '</p>
                <form action="suppression_article.php" method="POST">
                
              <button type="submit" value="'.$article['code_article'].'  " > Supprimer</button>

                </form>
            </div>
        </div>';
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}
?>






        <div class="vider-continuer">
          <hr />
          <button class="btn-vider-retour">
            <a href="#" class="">Continuer mes achats</a>
          </button>

          <button class="btn-vider-retour">
            <a href="#">Vider le panier</a>
          </button>
        </div>
      </div>
      <div class="facture">
        <span class="span1">Total</span>
        

<?php
echo '<span class="span2">'.$total.'


 </span>';
?>

       
        <br />
        <hr />
        <button class="paiement-btn">Paiement</button>
      </div>
    </div>
    <input type="text" id="outputText" />

    <footer>
      <div class="div-general-info">
        <div class="position">
          <i class="info-icon fas fa-map-marker-alt"></i>
          <div class="descrip-info">
            <h3>Nos Adresses</h3>
            <p>Centre Urbain Nord</p>
          </div>
        </div>
        <div class="contact">
          <i class="info-icon fa-solid fa-phone"></i>
          <div class="descrip-info">
            <h3>Contacter nous</h3>
            <p>+216 72313478</p>
          </div>
        </div>
        <div class="email">
          <i class="info-icon fa-solid fa-envelope"></i>
          <div class="descrip-info">
            <h3>Email</h3>
            <a href="mailto:Bakery-world@gmail.com">Bakery-world@gmail.com</a>
          </div>
        </div>
      </div>
      <hr class="separateur-hr" />
      <div class="div-info">
        <div class="info">
          <h4>Bakery World</h4>
          <hr />
          <p>
            Backery World est une pâtisserie passionnée par l'art de la
            pâtisserie. Nous sommes fiers de créer des produits de qualité
            supérieure, avec les meilleurs ingrédients pour garantir une
            expérience de dégustation inoubliable. Chez Backery World, nous
            proposons une large sélection de pâtisseries allant des classiques
            traditionnels aux créations les plus innovantes. Nous sommes
            déterminés à satisfaire les papilles de nos clients en offrant un
            large choix de produits frais et savoureux
          </p>
        </div>
        <div class="info liens">
          <h4>Liens utiles</h4>
          <hr />
          <ul>
            <li>
              <a href="">Mentions légales </a>
            </li>

            <li><a href="">A propos de nous</a></li>
            <li><a href="">Exprimer votre Feedback</a></li>
          </ul>
        </div>

        <div class="reseaux-soc info">
          <h4>Suivez nous</h4>
          <hr />
          <a href="#"><i class="fa-brands fa-facebook sm faceb"></i></a>
          <a href="#"><i class="fab fa-instagram sm insta"></i></a>
          <a href="#"><i class="fab fa-twitter sm twi"></i></a>
          <a href="#"><i class="fab fa-pinterest sm pin"></i></a>
        </div>
      </div>

      <div class="copyrights">
        <p>Copyright © 2023 Backery World</p>
      </div>
    </footer>
    <script src="panier.js"></script>
    <script src="panierSRC.js"></script>
  </body>
</html>
