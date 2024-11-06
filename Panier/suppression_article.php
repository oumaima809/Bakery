<?php


    session_start();
    
?>



<?php


$host = 'localhost';
$dbname = 'bakery';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $code_article = $_POST["code_Art"];
        $email = $_SESSION["email"];

        $query = "DELETE FROM panier WHERE adresse_client = ? AND code_article = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email,$code_article]);

      
      
        
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}
?>





