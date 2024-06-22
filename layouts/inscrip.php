<?php
// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=mon bog;charset=utf8', 'root', '');

// Fonction pour générer un code de confirmation unique
function generateConfirmationCode() {
    $length = 8;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, strlen($characters) - 1);
        $code .= $characters[$randomIndex];
    }

    return $code;
}

// Traitement du formulaire d'inscription
if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Vérification des champs
    if (!empty($nom) && !empty($email) && !empty($password) && !empty($confirmPassword)) {
        if ($password === $confirmPassword) {
            // Génération du code de confirmation
            $confirmationCode = generateConfirmationCode();

            // Enregistrement de l'utilisateur dans la base de données
            $query = "INSERT INTO user (nom, email, password, confirmation_code) VALUES (?, ?, ?, ?)";
            $stmt = $bdd->prepare($query);
            $stmt->execute([$nom, $email, password_hash($password, PASSWORD_DEFAULT), $confirmationCode]);

            // Envoi de l'e-mail de confirmation
            $to = $email;
            $subject = "Confirmation de votre inscription";
            $message = "Bonjour $nom,\n\nVeuillez cliquer sur le lien suivant pour confirmer votre inscription : " . 
                       "http://localhost/confirmation.php?code=$confirmationCode";
            $headers = "From: votreadresse@example.com";

            if (mail($to, $subject, $message, $headers)) {
                echo "Un e-mail de confirmation a été envoyé à votre adresse e-mail. Veuillez le vérifier.";
            } else {
                echo "Une erreur s'est produite lors de l'envoi de l'e-mail de confirmation.";
            }
        } else {
            echo "Les mots de passe ne correspondent pas.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form method="POST" action="">
        <label>Nom :</label>
        <input type="text" name="nom" required><br><br>
        
        <label>Email :</label>
        <input type="email" name="email" required><br><br>
        
        <label>Mot de passe :</label>
        <input type="password" name="password" required><br><br>
        
        <label>Confirmer le mot de passe :</label>
        <input type="password" name="confirm_password" required><br><br>
        
        <input type="submit" name="submit" value="S'inscrire">
    </form>
</body>
</html>
