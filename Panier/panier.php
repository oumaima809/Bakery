
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Navbar/navbar.css" />
    <link rel="stylesheet" href="../Footer/footer.css" />
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
    <?php include '../Navbar/navbar.php' ?>
    <?php
$host = 'localhost';
$dbname = 'bakery';
$username = 'root';
$password = '';


try {

      error_reporting(E_ERROR | E_PARSE);
      ini_set('display_errors', 0);
      $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $code_article = $_POST["code_Art"];
        $email = $_SESSION["email"];
        if($code_article){
               $query = "DELETE FROM panier WHERE adresse_client = ? AND code_article = ?";
              $stmt = $pdo->prepare($query);
              $stmt->execute([$email,$code_article]);
        }
        else{
          $query = "DELETE FROM panier WHERE adresse_client = ? ";
          $stmt = $pdo->prepare($query);
          $stmt->execute([$email]);
        }
   

      
      
        
    }


} catch (PDOException $e) {

    echo 'Erreur de connexion : ' . $e->getMessage();
}



?>
    <div class="conteneur-general">
      <div class="contenu-panier">

      <?php



try {
 

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
                
                <form  method="POST">
                
              <button class="btn-vider-retour" type="submit" name="code_Art" value="'.$article['code_article'].'  " > Supprimer</button>

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
            <a href="../Paiement/paiement.php" class="">Continuer mes achats</a>
          </button>
          <form method="POST">
  <button type="submit" class="btn-vider-retour">Vider le panier</button>
</form>
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
        <button class="paiement-btn">
        <a href="../Paiement/paiement.php" class="">Paiement</a>

        </button>
      </div>
    </div>
    <input type="text" id="outputText" />

    <?php include '../Footer/footer.php' ?>
    <script src="panier.js"></script>
    <script src="panierSRC.js"></script>
  </body>
</html>
