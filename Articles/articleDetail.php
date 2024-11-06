
<?php

            $host = 'localhost';
            $dbname = 'bakery';
            $username = 'root';
            $password = '';

            try {
                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
        <link rel="stylesheet" href="chocolat.css" />
        <link rel="stylesheet" href="../Navbar/navbar.css" />
        <link rel="stylesheet" href="../Footer/footer.css" />

        
        <link
          rel="stylesheet"
          href="../fontawesome-free-6.4.0-web/css/all.min.css"
        />

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

        <link
          href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap"
          rel="stylesheet"
        />
        <title>Macarons Chocolat</title>
    </head>



     <body>
            
        <!--------------------------------- Include Navbar------------------------------------------>
        <?php include '../Navbar/navbar.php'; ?>

        <!--------------------------------- Maintaining database connection ------------------------>

        


   
    
      
          <?php
            // Vérifier si l'ID de l'article est passé dans l'URL
            if (isset($_GET['nom'])) {
                $articleNom = $_GET['nom'];

                // Récupérer les détails de l'article depuis la base de données en utilisant l'ID
                $statement = $pdo->prepare("SELECT * FROM article WHERE idArt = :nom");
                $statement->bindParam(':nom', $articleNom);
                $statement->execute();
                $article = $statement->fetch();

                // Vérifier si l'article existe
                if ($article) {
                  
                } 
            

              echo '<div id="rows">
                    <div id="main">
                      <div id="content">
                        <figure id="magnifying_area">';
                        echo  '<img id="magnifying_img" src="../Categorie/'.$article['imgArt'].'">';
                    echo '   </figure>
                      </div>
                      <div class="content2">
                        <h1>'. $article['nomArt'] .'</h1>
                        <hr />
                        <br />

                        <span class="bold">Disponibilté : </span>
                        <span id="stock"> en stock <i class="fa-solid fa-check"></i></span>
                        <br />
                        <br />
                        <div id="prix">'. $article['prixArt'] .' millimes.</div>

                        <br />
                        <br />
                        <p id="def">'. $article['designArt'] .
                          
                        '</p>
                        <br />
                        <br />
                        <p class="infoss">
                          ingrédients : Chocolat noir Crème liquide entière Beurre doux Café
                          noir moulu de Legal le goût Liqueur de café Cacao en poudre non
                          sucré
                        </p>
                        <br />
                        <br />
                        <p class="infoss">
                          Valeurs nutritives : (pour 1 truffe) Cals:64 Gras:4,25g Glu:5,68g
                          Prot:0,79g
                        </p>
                        <br />
                        <br />
                        <br />';

                    }
                ?>







            <span class="bold"> Partager : </span>
            <span>
              <a href="https://www.facebook.com/" class="icon"
                ><i class="fa-brands fa-facebook sm faceb"></i
              ></a>
              <a href="https://www.instagram.com/" class="icon"
                ><i class="fab fa-instagram sm insta"></i
              ></a>
              <a href="https://www.pinterest.com/" class="icon"
                ><i class="fab fa-pinterest sm pin"></i
              ></a>
            </span>
            <br />
            <br />
            <br />

            <span class="bolder"
              >Poids Net :
              <select>
                <option selected>100g</option>
              </select></span
            >
            <br />
            <br />
            <br />

            <span class="bolder"
              >Poids Brut :
              <select>
                <option selected>120g</option>
              </select></span
            >
            <br />
            <br />
            <br />

            <span class="bolder"
              >Nombre de pièces :
              <select>
                <option selected>12PIECES</option>
              </select></span
            >
            <br />
            <br />
            <br />

            <span class="bold">Quantité </span>
            <span id="inline">
              <table id="table1">
                <tr>
                  <td class="cell1">
                    <button class="plus-btn" id="plus">
                      <i class="fas fa-plus"></i>
                    </button>
                  </td>
                  <td><p class="cell2" id="quantity" name="quantity">1</p></td>
                  
                  <td class="cell3">
                    <button class="minus-btn" id="minus">
                      <i class="fas fa-minus"></i>
                    </button>
                  </td>
                </tr>
              </table>
            </span>

            <br />
            <br />
            <br />

            <span>
              <table id="table2">
                <tr>
                  <td class="cellule2" id="cel1">
                    <form method="POST"   >
                    <input type="hidden" name="heart"  value="15">
                      <button type="submit" id="product-BTN">
                        <i  class="fas fa-heart button-heart"></i>
                      </button>
                    </form> 
                    
                  </td>
                  <td class="cellule2" id="cel2">
            <form method="POST" action="traitementPanier.php" >

            <input type="hidden" name="nom" value="<?php echo $_GET['nom']; ?>">

            <input type="hidden" name="content" id="contente" value="1">

                  <input class="add-cart" type="submit" value="AJOUTER AU PANIER"></form>
                  </td>
                  <td class="cellule2" id="cel3">
                    <a href="../../Paiement/paiement.php">ACHAT DIRECT</a>
                  </td>
                </tr>
              </table>
            </span>






            <h5 id="sécurisé">-Paiement Sécurisé-</h5>
            <img id="paiement" src="images/paiement.png" />
          </div>

          <div class="content3">
            <div class="con3">
              <h3>LIVRAISON</h3>
              <br />
              <p>Livraison dans toute la Tunisie en 24/72h</p>

              <i class="fas fa-truck icon-valeur"></i>
            </div>
            <div class="con3">
              <h3>PAIEMENT SÉCURISÉ</h3>
              <br />
              <p>Par carte bancaire, ou en paiement à la livraison</p>

              <i class="fa-solid fa-lock icon-valeur"></i>
            </div>
            <div class="con3">
              <h3>SERVICE CLIENT</h3>
              <br />
              <p>Toujours disponible</p>
              <br />
              <p>Téléphone : +216 72313478</p>

              <p>Email : Bakery-world@gmail.com</p>

              <i class="fa-solid fa-headphones icon-valeur"></i>
            </div>
          </div>
        </div>
        <div class="notif" id="notification"></div>

        <div id="content4">
          <h3 class="bolder">Vous pourriez également apprécier</h3>

          <button class="pre-btn"><img id="btn1" src="images/next.jpg" /></button>
          <button class="next-btn"><img id="btn2" src="images/next.jpg" /></button>

          <div class="product_container">


          <?php
            
            $category = $article['catArt'];

            try {

              $query = "SELECT * FROM article WHERE catArt = :cat AND idArt != :nom";
              $statement = $pdo->prepare($query); // Prepare the statement
              $statement->bindParam(':cat', $category); // Bind the category parameter
              $statement->bindParam(':nom', $articleNom); // Bind the article name parameter
              $statement->execute(); // Execute the statement
              $articles = $statement->fetchAll(PDO::FETCH_ASSOC); // Fetch all articles matching the criteria
                

                // Parcourir les articles et les afficher
                foreach ($articles as $article) {
                    echo 
                    '
                      <div class="product_card">
                            <div
                              class="product_image-mac"
                              onmouseover="showButtons(0)"
                              onmouseout="hideButtons(0)"
                            >
                              <a href="../Articles/articleDetail.php?nom='.$article['idArt'].'"
                                ><img
                                  src="../Categorie/'.$article['imgArt'].'"
                                  class="product-size-mac"
                                  class="product_thumb"
                              /></a>

                              <div class="product-btn">
                                <button id="product-BTN" class="cart">
                                  <i class="fas fa-heart button-heart"></i>
                                </button>
                                <button id="product-BTN" class="add-cart">
                                  <i class="fas fa-shopping-cart"></i>
                                </button>
                                <button id="product-BTN" onclick="changeIcon(0)">
                                  <i class="fa-solid fa-eye"></i>
                                </button>
                              </div>
                            </div>
                            <div class="product_info">
                              <h4 class="product_name">'.$article['nomArt'].'</h4>
                              <h4 class="product_name">'.$article['quantArt'].'</h4>
                              <div class="price">'.$article['prixArt'].' DT</div>
                            </div>
                       </div>';
                }
              } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
              }

          ?>



                </div>
        </div>
      </div>
    </div>


     
    <!------------------------ Include Footer ------------------------------------->
    <?php  include "../Footer/footer.php" ?>


  

   
    <script src="script.js"></script>
    <!-- <script src="aperç.js"></script> -->

    <script
      src="https://kit.fontawesome.com/759fe707e1.js"
      crossorigin="anonymous"
    ></script>


  </body>
</html>










