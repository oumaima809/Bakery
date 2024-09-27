
<?php


    session_start();
    error_reporting(E_ERROR | E_PARSE);

    
    ?>


<?php

$host = 'localhost';
$dbname = 'patisserie';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Votre code ici...

} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}


$adresseClient = $_SESSION['email'];
$articleId = $_POST['incrementBtn'] ?? $_POST['decrementBtn'];

echo $articleId;
$newQuantite = $_POST['qte'];
echo $newQuantite;

// Effectuez la mise à jour de la quantité dans la table "panier" en utilisant votre code PHP existant
// Si le bouton d'augmentation a été cliqué, augmentez la quantité
if (isset($_POST['incrementBtn'])) {






    $codeArticle = $_POST['codeArticle'];

    // Augmenter la quantité dans la table "panier"
    $query = "UPDATE panier SET quantite = quantite + 1 WHERE adresse_client = :adresseClient AND code_article = :codeArticle";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':adresseClient', $adresseClient);
    $stmt->bindParam(':codeArticle', $codeArticle);
    $stmt->execute();

    // Rediriger vers la page actuelle pour afficher les nouvelles quantités
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// Si le bouton de diminution a été cliqué, diminuez la quantité
elseif (isset($_POST['decrementBtn'])) {
    $codeArticle = $_POST['codeArticle'];
    echo 'cliique';
    // Vérifier si la quantité actuelle est supérieure à 1 avant de la diminuer
    $query = "SELECT quantite FROM panier WHERE adresse_client = :adresseClient AND code_article = :codeArticle";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':adresseClient', $adresseClient);
    $stmt->bindParam(':codeArticle', $codeArticle);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

 

    if ($newQuantite>1) {


    
 
    // Diminuer la quantité dans la table "panier"
        $query = "UPDATE panier SET quantite = quantite - 1 WHERE adresse_client = :adresseClient AND code_article = :codeArticle";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':adresseClient', $adresseClient);
        $stmt->bindParam(':codeArticle', $codeArticle);
        $stmt->execute();
    }
}


// Rediriger vers la page précédente ou afficher un message de confirmation
header("Location: panier.php");

?>
