<?php

session_start();


$host = 'localhost';
$dbname = 'bakery';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Votre code ici...

} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}


echo $_SESSION['email'];
$email=$_SESSION['email'];
$quantity=$_POST['content'];
$idArt=$_POST['nom'];


$query = "SELECT * FROM panier WHERE code_article = '$idArt' AND adresse_client = '$email'";


$result = $pdo->query($query);


if ($result->rowCount() > 0) {
    // L'ID de l'article existe déjà, effectuer une requête UPDATE pour mettre à jour la quantité
    $query = "UPDATE panier SET quantite = quantite + $quantity  WHERE code_article = '$idArt'";
    $pdo->exec($query);
} else {
    // L'ID de l'article n'existe pas encore, effectuer une requête INSERT pour insérer une nouvelle ligne
    $query = "INSERT INTO panier (code_article, quantite,adresse_client) VALUES ('$idArt', $quantity,'$email')";
    $pdo->exec($query);
}

// Rediriger vers la page de panier ou toute autre page appropriée
header("Location: ../Panier/panier.php");
exit();


           


            
            echo $quante;

            ?>