<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Accueil/Css/styleAccueil.css" />
    <link rel="stylesheet" href="Css/styleInscri.css" />
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
      <a class="inscription" href="../Inscription/inscription.html"
        ><span>Inscription</span></a
      >
      <a class="connexion" href="../Connexion/connexion.html"
        ><span>Connexion</span></a
      >
    </div>
    <nav>
      <div class="logo">
        <p>Bakery World</p>
      </div>
      <ul>
        <li><a href="../Accueil/Accueil.html">Accueil </a></li>
        <li>
          <a href="" class="service">Catégories</a>
          <ul>
            <li><a href="../Categorie/macarons.html">Macarons</a></li>
            <li><a href="../Categorie/cupcakes.html">Cupcakes</a></li>
            <li><a href="../Categorie/croissant.html">Croissants</a></li>
            <li><a href="../Categorie/chocolat.html">Chocolats</a></li>
          </ul>
        </li>
        <li><a href="../A propos/propos.html">A propos</a></li>
        <li>
          <a href="../Favoris/favoris.html"><i class="fas fa-heart"></i></a>
        </li>
        <li class="cart">
          <a href="../Articles/cart.html"
            ><i class="fas fa-shopping-cart"></i>
          </a>
        </li>
      </ul>
    </nav>
    <div class="premiere-section">
      <div class="conteneur">
        <div class="contenu-form">
          <h3>Backery World</h3>
          <br />
          <p>
            Backery World est une pâtisserie passionnée par l'art de la
            pâtisserie. Nous sommes fiers de créer des produits de qualité
            supérieure, avec les meilleurs ingrédients pour garantir une
            expérience de dégustation inoubliable.
          </p>
          <a href="../A propos/propos.html">savoir plus</a>
        </div>
        <div class="login">
          <h2>Créer un compte</h2>
          <form id="form-inscription" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <span class="obligatoire">* Tous les champs sont obligatoires</span>

            <input
              type="text"
              required
              name="nom"
              id="nom"
              placeholder="Nom"
              autocomplete="off"
            />

            <input
              type="text"
              id="prenom"
              name="prenom"
              placeholder="Prénom"
              required
              autocomplete="off"
            />

            <input
              
              required
              type="email"
              name="email"
              id="mail"
              placeholder="exemple@exemple.com"
              autocomplete="off"
            />

            <input
              type="password"
              name="password"
              id="mp"
              placeholder="Mot de passe"
              required
              autocomplete="off"
            />

            <input
              type="password"
              name=""
              id="mp-confirm"
              placeholder="Confirmer mot de passe"
              required
              autocomplete="off"
            />

            <div class="mentions-CB">
              <input id="mon-cb" class="cb" name="CB" type="checkbox" />
              <span> <a class="mentions-legales" href=""> j'ai lu les Mentions légales</a> </span>
            </div>
            <p id="erreur"></p>
            <input id="" class="btn-submit" type="submit" value="créer" />
            <p>Vous avez déjà un compte ?</p>
            <a href="../Connexion/connexion.html">se connecter</a>
          </form>
        </div>
      </div>
    </div>
    <?php
    $host = 'localhost';
    $dbname = 'patisserie';
    $username = 'root';
    $password = '';
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Vérifier si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = md5($_POST['password']); // Crypter le mot de passe avec MD5
    
            // Vérifier que tous les champs sont remplis
            if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($password)) {
                // Vérifier si l'adresse email existe déjà
                $query = "SELECT COUNT(*) FROM client WHERE adressCl = '$email'";
                $result = $pdo->query($query);
                $count = $result->fetchColumn();
    
                if ($count == 0) {
                    // L'adresse email n'existe pas, procéder à l'inscription
    
                    // Créer la requête d'insertion avec le mot de passe crypté
                    $insertQuery = "INSERT INTO client (adressCl,nomCl, prenCl,passCl) VALUES ('$email','$nom', '$prenom', '$password')";
    
                    // Exécuter la requête d'insertion
                    $rowCount = $pdo->exec($insertQuery);
    
                   
                } else {
                    echo '<p class="erreurInsert"> Cette adresse email est déjà utilisée.</p>';
                }
            } else {
                echo "Veuillez remplir tous les champs du formulaire.";
            }
        }
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
    ?>
    
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
              <a href="../Mentions/mentions.html">Mentions légales </a>
            </li>

            <li><a href="../A propos/propos.html">A propos de nous</a></li>
            <li>
              <a href="../Commentaire/commentaire.html"
                >Exprimer votre Feedback</a
              >
            </li>
          </ul>
        </div>

        <div class="reseaux-soc info">
          <h4>Suivez nous</h4>
          <hr />
          <a
            href="https://www.facebook.com/groups/292204118759292/"
            target="_blank"
            ><i class="fa-brands fa-facebook sm faceb"></i
          ></a>
          <a href="https://www.instagram.com/world.of.bakery/" target="_blank"
            ><i class="fab fa-instagram sm insta"></i
          ></a>
          <a href=""><i class="fab fa-twitter sm twi"></i></a>
          <a href=""><i class="fab fa-pinterest sm pin"></i></a>
        </div>
      </div>

      <div class="copyrights">
        <p>Copyright © 2023 Backery World</p>
      </div>
    </footer>

    <script src=""></script>
  </body>
</html>
