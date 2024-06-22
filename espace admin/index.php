<?php
session_start();
if(!$_SESSION['mdp']){ 
    header('Location: connexion.php');
  
}else{

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <a href="user.php">Liste des membres</a>
   <button> <a href="logout.php">Se deconnecter</a>
   </button>
</body>
</html>