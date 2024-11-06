<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Navbar/navbar.css" />
    <link rel="stylesheet" href="../Footer/footer.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
      rel="stylesheet"
      href="../fontawesome-free-6.4.0-web/css/all.min.css"
    />
    <link rel="stylesheet" href="Css/stylePaiement.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap"
      rel="stylesheet"
    />
    <title>Document</title>
  </head>
  <body>
    <?php include "../Navbar/navbar.php"?>
    <?php
    
    $host = 'localhost';
    $dbname = 'bakery';
    $username = 'root';
    $password_ = '';
    $email = $_SESSION["email"];
   

    try {
      $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password_);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query = "select code_article from panier where adresse_client = ? ";
      $statement = $pdo->prepare($query);
      $statement->execute([$email]);
      $articles = $statement->fetchAll(PDO::FETCH_ASSOC);
      $codes = array_column($articles, 'code_article');
      

      
       





    } catch (PDOException $e) {
      echo 'Erreur de connexion : ' . $e->getMessage();
  }
  ?>
    <div class="global-premier-div">
      <div class="div-paiement">
        <div class="cordonnees-formulaire">
          <h1>Vos cordonnées</h1>
          <p><?php echo $_SESSION["prenom"]." ".$_SESSION["nom"] ;?></p>
          <p><?php echo $_SESSION["email"];?></p>
        </div>
        <div class="info-session">
          <h3>Numéro de la commande N°21009</h3>
          <span>Il reste jusqu'à la fin de session </span>
          <span id="temps-restant"></span>
        </div>

        <div class="partie-formulaire">
          <form action="" id="paiement-form">
            <label class="label-select" for="pays">Pays/région</label>

            <select name="pays" id="pays">
              <span class="obligatoire">*</span>

              <option value="">Tunisie</option>
              <option value="">France</option>
            </select>
            <p class="obligatoire obligatoire-adresse">*</p>

            <input
              id="adress"
              type="text"
              placeholder="Adresse"
              required
              autocomplete="off"
            />

            <input
              id="ville"
              type="text"
              placeholder="Ville"
              autocomplete="off"
            />

            <input
              id="codeP"
              type="text"
              placeholder="Code Postal"
              autocomplete="off"
            />
            <p class="obligatoire">*</p>

            <input
              type="text"
              name=""
              id="telephone"
              placeholder="telephone"
              required
              autocomplete="off"
            />

            <!-- <i class="fas fa-question-circle"></i>-->

            <div class="carte-acceptees">
              <p>Les cartes acceptées</p>
              <img class="cards" src="images/card.png" alt="" />
            </div>
            <div class="methodes-paiement">
              <label for="methode-paiement"
                >Mode de Paiement : <span class="obligatoire">*</span></label
              >

              <input type="radio" name="cards" id="methode-paiement" />
              <p>e-dinar</p>
              <input type="radio" name="cards" id="" />
              <p>mastercard</p>
              <input type="radio" name="cards" id="" />
              <p>visa</p>
            </div>
            <p class="obligatoire">*</p>

            <input
              type="text"
              name=""
              id="num-carte"
              placeholder="Numéro de carte"
              required
              autocomplete="off"
            />
            <p class="obligatoire">*</p>

            <input
              required
              type="text"
              name=""
              id="nom-titulaire"
              placeholder="Nom titulaire de la carte"
              autocomplete="off"
            />

            <label class="label-select" for="mois-expiration"
              >Mois d'expiration</label
            >

            <select name="mois-exp" id="mois-exp" aria-placeholder="MM">
              <option value="">01</option>
              <option value="">02</option>
              <option value="">03</option>
              <option value="">04</option>
              <option value="">05</option>
              <option value="">06</option>
              <option value="">07</option>
              <option value="">08</option>
              <option value="">09</option>
              <option value="">10</option>
              <option value="">11</option>
              <option value="">12</option>
            </select>
            <label class="label-select" for="pays">Année d'expiration</label>

            <select name="date-exp" id="annee-exp" aria-placeholder="AA">
              <option value="">23</option>
              <option value="">24</option>
              <option value="">25</option>
              <option value="">26</option>
            </select>
            <p class="obligatoire">*</p>

            <input
              id="code-securite"
              type="text"
              placeholder="Code de sécurité"
              required
              autocomplete="off"
              autocomplete="off"
            />
            <p id="erreur"></p>

            <i class="fa-solid fa-credit-card"></i>
            <div class="pay-btn">
              <button type="submit" class="paiement-btn">Payer</button>
            </div>
          </form>
        </div>
      </div>
      <div class="div-panier">
       
          <?php 
         
            $total = 6150;
            foreach ($codes as $article) {
              $query = "SELECT * FROM article where idArt=$article";
              $stmt = $pdo->query($query);
              $product = $stmt->fetch(PDO::FETCH_ASSOC);
              $total += (int) $product['prixArt'];

              echo      
                  '<div class="article-achete">
                      <div class="img-achat">
                        <img src="../Categorie/'.$product['imgArt'].'" alt="" />
                        <div class="nombre-achat">
                          <p>2</p>
                        </div>
                  </div> 
                  <div class="descrip-achat">
                        <h3>'.$product['nomArt'].'</h3>
                        <p>Poids net : 500g</p>
                      </div>
                      <p>'.$product['prixArt'].' DT</p>
                  </div>';


            }
         

         
      
      
      
      ?>
  

        <div class="total-achat">
          <h3>Total</h3>
          <span>Taxes de 6,150 DT incluse</span>
          <span class="montant"><?php echo $total;?></span>
        </div>
      </div>
    </div>

   <?php include "../Footer/footer.php"?>

    <script src="js/paiement.js"></script>
  </body>
</html>
