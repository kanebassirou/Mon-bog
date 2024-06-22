<?php

// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8', 'root', '');

// Requête SQL pour récupérer les données
$query = "SELECT * FROM users";

// Exécution de la requête
$result = $bdd->query($query);

// Vérification si la requête a réussi
if ($result) {
    // Boucle pour parcourir les enregistrements
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        // Affichage des données
        echo "ID : " . $row['id'] .                  "<br>";
        echo "Nom : " . $row['pseudo'] . "<br>";
        // Autres champs à afficher
        
        echo "<br>";
    }
    
    // Fermeture du curseur
    $result->closeCursor();
} else {
    // Gestion des erreurs si la requête a échoué
    echo "Erreur lors de l'exécution de la requête.";
}

?>