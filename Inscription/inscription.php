<?php
  session_start();
  $authenticated = false;
  if(isset($_SESSION["email"])){
    $authenticated =true;
  }



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Navbar/navbar.css" />
    <link rel="stylesheet" href="../Footer/footer.css" />
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

        <?php include '../Navbar/navbar.php'?>
        <?php

        



    $host = 'localhost';
    $dbname = 'bakery';
    $username = 'root';
    $password_ = '';

    $expressionMp ="/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/";
    $phoneExpression ="/^(?:(\+|00\d{1,3})?[-]?\d{7,12}|\d{7,12})$/";
   
    $nom="" ;
    $prenom="";
    $email="";
    $phone="";


    $nom_error="";
    $prenom_error="";
    $email_error="";
    $phone_error="";
    $password_error="";
    $confirm_password_error="";
    $checkbox_error ="";
    $error =false ;
    
 
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password_);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
          $nom = $_POST['nom'];
          $prenom = $_POST['prenom'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $password = $_POST['password']; 
          $confirm_password = $_POST['confirm_password'];
          $checkbox = isset($_POST['checkbox']) ? $_POST['checkbox'] : null;

          //***************** validate First Name *********************
          if(empty($nom)){
            $error = true ;
            $nom_error ="Le nom est obligatoire";

          }
          //***************** validate Last Name *********************/
          if(empty($prenom)){
            $error = true ;
            $prenom_error ="Le prenom est obligatoire";

          }

          //***************** validate Email *********************/
          if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $email_error = "Le format de l'email n'est pas valide";
            $error = true;
            
            
        }
            $query = "SELECT COUNT(*) FROM client WHERE email = '$email' ";
            $result = $pdo->query($query);
            $count = $result->fetchColumn();

            if($count!=0){
                $email_error="Cet adresse email est déjà utilisé";
                $error = true;

            }

           

         
          

          //****************** validate Phone **********************/

          if(!preg_match($phoneExpression,$phone)){
            $phone_error ="Le format du numéro n'est pas valide";
            $error = true;
               

          }

          //***************** validate Password **********************/
          if(!preg_match($expressionMp,$password)){
            $error = true ;
            $password_error ="Le mot de passe doit contenir au moins une lettre majuscule, une miniscule ,un chiffre et de 8 caractères ou plus .";

          }

          //***************** validate Confirm Password *********************/
          if($password!=$confirm_password){
            $error = true ;
            $confirm_password_error ="Ces mots de passe ne correspondaient pas. Essayer à nouveau.";

          }

          //****************** validate the checkbox *************************/
          if ($checkbox !== 'on') {
            $checkbox_error = "Veuillez accepter les Mentions légales";
            $error = true;
        }


       

        if(!$error){
          $password = password_hash($password,PASSWORD_DEFAULT);


          $query = "Insert into client(nom,prenom,email,phone,password) values(?,?,?,?,?) ";
          $statement = $pdo->prepare($query);
          $statement->execute([$nom, $prenom, $email, $phone, $password]);
          $id_client = $pdo->lastInsertId();
          $statement->close();


          //************************** A new account is created  ***************************/

          //Save session data
          $_SESSION["id"] = $id_client;
          $_SESSION["nom"] =$nom;
          $_SESSION["prenom"] =$prenom;
          $_SESSION["email"] =$email;
          $_SESSION["phone"] =$phone;
          
          header("location: /inscription.php");
          exit;
          

    


         



        }
      



          

         





    
        }
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
    ?>
        


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
          <a href="../A propos/propos.php">savoir plus</a>
        </div>
        <?php
           
           if($authenticated) echo "you have successfully registred!";
           else echo '
           <div class="login">
          <h2>Créer un compte</h2>
          <form id="form-inscription" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <span class="obligatoire">* Tous les champs sont obligatoires</span>

            <input
              type="text"
              
              name="nom"
              id="nom"
              placeholder="Nom"
              autocomplete="off"
              value = "<?php echo $nom ; ?>"
            />
            <span class="validation_error"><?php echo $nom_error; ?></span>

            <input
              type="text"
              id="prenom"
              name="prenom"
              placeholder="Prénom"
              autocomplete="off"
              
              value = "<?php echo $prenom ; ?>"
            />
            <span class="validation_error"><?php echo $prenom_error; ?></span>


            <input
              
              type="email"
              name="email"
              id="mail"
              placeholder="exemple@exemple.com"
              autocomplete="off"

              value = "<?php echo $email ; ?>"
            />
            <span class="validation_error"><?php echo $email_error; ?></span>

            <input
              
              type="phone"
              name="phone"
              id="phone"
              placeholder="Numéro de téléphone"
              autocomplete="off"

              value = "<?php echo $phone ; ?>"
            />
            <span class="validation_error"><?php echo $phone_error; ?></span>


            <input
              type="password"
              name="password"
              id="mp"
              placeholder="Mot de passe"
              autocomplete="off"
              
            />
            <span class="validation_error"><?php echo $password_error; ?></span>


            <input
              type="password"
              name="confirm_password"
              id="mp-confirm"
              placeholder="Confirmer mot de passe"
              autocomplete="off"
              
            />
            <span class="validation_error"><?php echo $confirm_password_error; ?></span>


            <div class="mentions-CB">
              <input id="mon-cb" class="cb" name="checkbox" type="checkbox" />
              <span> <a class="mentions-legales" href="../Mentions/mentions.php"> j\'ai lu les Mentions légales</a> </span>
              <span class="validation_error"><?php echo $checkbox_error; ?></span>
            </div>

            <p id="erreur"></p>
            <input id="" class="btn-submit" type="submit" value="créer" />
            <p>Vous avez déjà un compte ?</p>
            <a href="../Connexion/connexion.php">se connecter</a>
          </form>
        </div>'
    
           ;
        
        
        
        ?>
          </div>
    </div>
    
    
    <?php include '../Footer/footer.php'?>

    <script src=""></script>
  </body>
</html>
