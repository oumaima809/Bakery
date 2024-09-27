
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
        $email = $_POST['email'];
        $password = md5($_POST['password']); // Crypter le mot de passe avec MD5

        // Vérifier que l'adresse email et le mot de passe ne sont pas vides
        if (!empty($email) && !empty($password)) {
            // Vérifier l'existence du client dans la base de données
            $query = "SELECT COUNT(*) FROM client WHERE adressCl = '$email' AND passCl = '$password'";
            $result = $pdo->query($query);
            $count = $result->fetchColumn();

            if ($count == 1) {

              session_start();
              $_SESSION['email'] = $email; // Enregistrer l'adresse email dans la session
                 // Enregistrer le nom dans la session (vous pouvez le récupérer depuis la base de données si nécessaire)
               
                // L'utilisateur existe dans la base de données, procéder à la connexion
                // Vous pouvez rediriger l'utilisateur vers une autre page ici

                header("Location: ../Accueil/Accueil.php");


            } else {
                echo '<p class="erreurCon"> Identifiants invalides. </p>';
            }
        } else {
            echo '<p class="erreurCon"> Veuillez remplir tous les champs du formulaire.</p>';
        }
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../Inscription/Css/styleInscri.css" />
    <link
      rel="stylesheet"
      href="../fontawesome-free-6.4.0-web/css/all.min.css"
    />
    <link rel="stylesheet" href="../Accueil/Css/styleAccueil.css" />
    <link rel="stylesheet" href="Css/styleConnexion.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
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
        hii
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
          <h2>Connexion</h2>
          <form  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
            <span class="obligatoire">*</span>
            <input
              required
              pattern="(^[a-z0-9]+)@([a-z0-9])+(\.)([a-z]{2,4})"
              type="email"
              name="email"
              id=""
              autocomplete="off"
              placeholder="exemple@exemple.com"
            />
            <span class="obligatoire">*</span>
            <input
              type="password"
              name="password"
              id=""
              placeholder="Mot de passe"
              autocomplete="off"
              required
            />
            <input class="btn-submit" type="submit" value="Se connecter" />
          
            <a href="../Inscription/inscription.html">Pas de compte ? créer un compte</a>
          </form>
        </div>
      </div>
    </div>


  

 










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
          <a href="https://twitter.com/search?q=backery%20world&src=typed_query"
            ><i class="fab fa-twitter sm twi"></i
          ></a>
          <a
            href="https://www.pinterest.fr/search/pins/?q=backery%20world&rs=typed"
            ><i class="fab fa-pinterest sm pin"></i
          ></a>
        </div>
      </div>

      <div class="copyrights">
        <p>Copyright © 2023 Backery World</p>
      </div>
    </footer>
  </body>
</html>
