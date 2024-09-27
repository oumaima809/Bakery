<?php


    session_start();
    
    ?>



<?php



$query = "DELETE FROM panier WHERE adresse_client =  '' AND code_article = :codeArticle";
$stmt = $pdo->prepare($query);

$stmt->execute();




?>