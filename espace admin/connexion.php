<?php
session_start();
if(isset($_POST['envoi'])){ 
if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
    $pseudoDefaut="admin";
    $mdpDefaut ="root";
    $pseudoSaisi = htmlspecialchars($_POST['pseudo']);
    $mdpSaisi = htmlspecialchars($_POST['mdp']);
    if($pseudoSaisi == $pseudoDefaut AND $mdpDefaut == $mdpSaisi){
        $_SESSION['mdp'] = $mdpSaisi;
        header('Location: index.php');

    }else {
        echo"votre mot de Administrateur est incorrecte";
    }
}


   
else { 
echo"veuillez completez tous les champs";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <form action="" method="post" align ="center">
        <input type="text" name="pseudo">
        <br>
        <input type="password" name="mdp" autocomplete="off">
        <br><br>

        <input type="submit" name="envoi" autocomplete="off">


    </form>
    
</body>
</html>