<!--------------------------------- Maintaining connection ----------------------------------->
<?php

    session_start();
    
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="chocolat.css" />
        
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
                  <p class="cell2" id="quantity">1</p>
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
                    <button id="product-BTN">
                      <i class="fas fa-heart button-heart"></i>
                    </button>
                  </td>
                  <td class="cellule2" id="cel2">
            <form method="POST" action="traitementPanier.php" >

            <input type="hidden" name="nom" value="<?php echo $_GET['nom']; ?>">

            <input type="text" name="content" id="contente" value="0">

                  <input class="add-cart" type="submit" value="AJOUTER AU PANIER">
                  </td>
                  <td class="cellule2" id="cel3">
                    <a href="../../Paiement/paiement.html">ACHAT DIRECT</a>
                  </td></form>
                </tr>
              </table>
            </span>






            <h5 id="sécurisé">-Paiement Sécurisé-</h5>
            <img id="paiement" src="paiement.png" />
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

          <button class="pre-btn"><img id="btn1" src="../next.jpg" /></button>
          <button class="next-btn"><img id="btn2" src="../next.jpg" /></button>

          <div class="product_container">
            <div class="product_card">
              <div
                class="product_image-mac"
                onmouseover="showButtons(0)"
                onmouseout="hideButtons(0)"
              >
                <a href="framboise.html"
                  ><img
                    src="../images/chocociframboise macaron.png"
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
                <h4 class="product_name">Macaron du chocociframboise</h4>
                <h4 class="product_name">12 Pièces</h4>
                <div class="price">22.000 DT</div>
              </div>
            </div>

            <div class="product_card">
              <div
                class="product_image-mac"
                onmouseover="showButtons(1)"
                onmouseout="hideButtons(1)"
              >
                <a href="fraisemac.html"
                  ><img
                    src="../images/fraisemac.png"
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
                  <button id="product-BTN" onclick="changeIcon(1)">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                </div>
              </div>
              <div class="product_info">
                <h4 class="product_name">Macaron aux fraises</h4>
                <h4 class="product_name">12 Pièces</h4>
                <div class="price">18.000 DT</div>
              </div>
            </div>

            <div class="product_card">
              <div
                class="product_image-mac"
                onmouseover="showButtons(2)"
                onmouseout="hideButtons(2)"
              >
                <a href="crème.html">
                  <img
                    src="../images/macaron crème.png"
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
                  <button id="product-BTN" onclick="changeIcon(2)">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                </div>
              </div>
              <div class="product_info">
                <h4 class="product_name">Macaron à la crème du lait</h4>
                <h4 class="product_name">12 Pièces</h4>
                <div class="price">18.000 DT</div>
              </div>
            </div>
            <div class="product_card">
              <div
                class="product_image-mac"
                onmouseover="showButtons(3)"
                onmouseout="hideButtons(3)"
              >
                <a href="mogador.html"
                  ><img
                    src="../images/macaron mogador.png"
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
                  <button id="product-BTN" onclick="changeIcon(3)">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                </div>
              </div>
              <div class="product_info">
                <h4 class="product_name">Macaron du mogador</h4>
                <h4 class="product_name">12 Pièces</h4>
                <div class="price">18.000 DT</div>
              </div>
            </div>

            <div class="product_card">
              <div
                class="product_image-mac"
                onmouseover="showButtons(4)"
                onmouseout="hideButtons(4)"
              >
                <a href="jardin.html"
                  ><img
                    src="../images/macrons jardin enchanté.png"
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
                  <button id="product-BTN" onclick="changeIcon(4)">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                </div>
              </div>
              <div class="product_info">
                <h4 class="product_name">Macaron du jardin enchanté</h4>
                <h4 class="product_name">12 Pièces</h4>
                <div class="price">23.000 DT</div>
              </div>
            </div>

            <div class="product_card">
              <div
                class="product_image-mac"
                onmouseover="showButtons(5)"
                onmouseout="hideButtons(5)"
              >
                <a href="pistache.html"
                  ><img
                    src="../images/pistache.png"
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
                  <button id="product-BTN" onclick="changeIcon(5)">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                </div>
              </div>
              <div class="product_info">
                <h4 class="product_name">macaron au saveur de pistache</h4>
                <h4 class="product_name">12 Pièces</h4>
                <div class="price">22.000 DT</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


     
    <!------------------------ Include Footer ------------------------------------->
    <?php  include "../Footer/footer.php" ?>


  

   
    <script src="chocolatmac.js"></script>
    <script src="aperç.js"></script>

    <script
      src="https://kit.fontawesome.com/759fe707e1.js"
      crossorigin="anonymous"
    ></script>

    <script>
    



    const plusBtn = document.getElementById("plus");
const minusBtn = document.getElementById("minus");
var quantityElement = document.getElementById("contente");


plusBtn.addEventListener("click", function () {
  let quantity = parseInt(quantityElement.value);
  quantity += 1;
  quantityElement.value = quantity;

 
  alert(quantityElement.value);
});

minusBtn.addEventListener("click", function () {
  let quantity = parseInt(quantityElement.innerHTML);
  if (quantity > 1) {
    quantity -= 1;
    quantityElement.value = quantity;
  }
});





  </script>

  </body>
</html>










